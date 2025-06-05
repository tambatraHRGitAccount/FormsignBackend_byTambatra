<?php

namespace App\Security;

use App\Repository\UserAccountRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;

class ApiTokenAuthenticator extends AbstractAuthenticator implements AuthenticationEntryPointInterface
{
    private UserAccountRepository $userAccountRepository;
    private LoggerInterface $logger;

    public function __construct(UserAccountRepository $userAccountRepository, LoggerInterface $logger)
    {
        $this->userAccountRepository = $userAccountRepository;
        $this->logger = $logger;
    }

    public function supports(Request $request): ?bool
    {
        return $request->headers->has('Authorization') &&
               str_starts_with($request->headers->get('Authorization'), 'Bearer ');
    }

    public function authenticate(Request $request): SelfValidatingPassport
    {
        $authHeader = $request->headers->get('Authorization');
        $apiToken = substr($authHeader, 7); // Supprime 'Bearer '

        $this->logger->info('Authenticating with API token', ['token_preview' => substr($apiToken, 0, 10) . '...']);

        return new SelfValidatingPassport(
            new UserBadge($apiToken, function ($apiToken) {
                $user = $this->userAccountRepository->findByApiToken($apiToken);
                if (!$user) {
                    $this->logger->warning('Invalid API token', ['token' => substr($apiToken, 0, 10) . '...']);
                    throw new AuthenticationException('Invalid API token');
                }
                $this->logger->info('User authenticated successfully', ['user_id' => $user->getId()]);
                return $user;
            })
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        return new JsonResponse([
            'error' => 'Authentication failed',
            'message' => $exception->getMessage()
        ], Response::HTTP_UNAUTHORIZED);
    }

    public function start(Request $request, AuthenticationException $authException = null): Response
    {
        return new JsonResponse([
            'error' => 'Authentication required',
            'message' => $authException?->getMessage()
        ], Response::HTTP_UNAUTHORIZED);
    }
}

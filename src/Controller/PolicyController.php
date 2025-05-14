<?php
namespace App\Controller;

use App\Dto\MaxValuesOutput;
use App\Repository\PoliciesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PolicyController extends AbstractController
{
    private PoliciesRepository $policiesRepository;

    public function __construct(PoliciesRepository $policiesRepository)
    {
        $this->policiesRepository = $policiesRepository;
    }

    #[Route('/api/policies/max-values', name: 'policies_max_values', methods: ['GET'])]
    public function getMaxValues(): JsonResponse
    {
        try {
            $maxValues = $this->policiesRepository->findMaxValues();
            $maxValuesOutput = new MaxValuesOutput(
                $maxValues['maxQbInvNum'],
                $maxValues['maxPlacingNumber']
            );

            return $this->json($maxValuesOutput, 200);
        } catch (\Exception $e) {
            return $this->json([
                'error' => 'Échec de la récupération des valeurs maximales',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
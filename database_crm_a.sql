-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 22 mai 2025 à 14:35
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `database_crm_a`
--

-- --------------------------------------------------------

--
-- Structure de la table `acc_monthyear`
--

CREATE TABLE `acc_monthyear` (
  `ID` bigint(20) NOT NULL,
  `STATUS` varchar(255) DEFAULT NULL,
  `ACC_MONTH` varchar(255) DEFAULT NULL,
  `ACC_YEAR` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `date_rdv` date NOT NULL,
  `comment` text DEFAULT NULL,
  `request_origin` varchar(50) NOT NULL,
  `operation_type` varchar(50) NOT NULL,
  `follow_up_status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `authorisation`
--

CREATE TABLE `authorisation` (
  `ID_auth` int(11) NOT NULL,
  `Title_AuthPerson` varchar(10) DEFAULT NULL,
  `Surname_AuthPerson` varchar(50) DEFAULT NULL,
  `Forename_AuthPerson` varchar(100) DEFAULT NULL,
  `Job_Title_AuthPerson` varchar(100) DEFAULT NULL,
  `Phone1_AuthPerson` varchar(15) DEFAULT NULL,
  `Phone2_AuthPerson` varchar(15) DEFAULT NULL,
  `Phone3_AuthPerson` varchar(15) DEFAULT NULL,
  `Phone4_AuthPerson` varchar(15) DEFAULT NULL,
  `Email_Address_1_AuthPerson` varchar(100) DEFAULT NULL,
  `CRMClientRef` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bon_emission`
--

CREATE TABLE `bon_emission` (
  `id` int(11) NOT NULL,
  `placing_no` varchar(50) DEFAULT NULL,
  `year` char(4) DEFAULT NULL,
  `month` char(2) DEFAULT NULL,
  `fsc_fee` decimal(10,2) DEFAULT NULL,
  `pol_fee` decimal(10,2) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `insurance_1_interest` varchar(255) DEFAULT NULL,
  `insurance_1_sum_insured` decimal(15,2) DEFAULT NULL,
  `insurance_2_interest` varchar(255) DEFAULT NULL,
  `insurance_2_sum_insured` decimal(15,2) DEFAULT NULL,
  `premium_1_section` varchar(50) DEFAULT NULL,
  `premium_1_sum_insured` decimal(15,2) DEFAULT NULL,
  `premium_1_fire` decimal(10,2) DEFAULT NULL,
  `premium_1_riots` decimal(10,2) DEFAULT NULL,
  `premium_1_cyclone` decimal(10,2) DEFAULT NULL,
  `premium_1_burglary` decimal(10,2) DEFAULT NULL,
  `premium_1_others` decimal(10,2) DEFAULT NULL,
  `premium_1_hcc` varchar(10) DEFAULT NULL,
  `premium_1_wpe` decimal(15,2) DEFAULT NULL,
  `premium_2_section` varchar(50) DEFAULT NULL,
  `premium_2_sum_insured` decimal(15,2) DEFAULT NULL,
  `premium_2_fire` decimal(10,2) DEFAULT NULL,
  `premium_2_riots` decimal(10,2) DEFAULT NULL,
  `premium_2_cyclone` decimal(10,2) DEFAULT NULL,
  `premium_2_burglary` decimal(10,2) DEFAULT NULL,
  `premium_2_others` decimal(10,2) DEFAULT NULL,
  `premium_2_hcc` varchar(10) DEFAULT NULL,
  `premium_2_wpe` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bon_emission`
--

INSERT INTO `bon_emission` (`id`, `placing_no`, `year`, `month`, `fsc_fee`, `pol_fee`, `remarks`, `insurance_1_interest`, `insurance_1_sum_insured`, `insurance_2_interest`, `insurance_2_sum_insured`, `premium_1_section`, `premium_1_sum_insured`, `premium_1_fire`, `premium_1_riots`, `premium_1_cyclone`, `premium_1_burglary`, `premium_1_others`, `premium_1_hcc`, `premium_1_wpe`, `premium_2_section`, `premium_2_sum_insured`, `premium_2_fire`, `premium_2_riots`, `premium_2_cyclone`, `premium_2_burglary`, `premium_2_others`, `premium_2_hcc`, `premium_2_wpe`, `created_at`, `updated_at`) VALUES
(1, '3000', '2025', '05', 100.00, 50.00, 'Exemple de remarque', 'Group Personal Accident', NULL, NULL, NULL, 'A01', 3000000.00, NULL, NULL, NULL, NULL, NULL, '0.19655%', 5896.00, 'B01', 4700000.00, NULL, NULL, NULL, NULL, NULL, '0.36942%', 17363.00, '2025-05-13 12:46:11', '2025-05-13 12:46:11');

-- --------------------------------------------------------

--
-- Structure de la table `claims`
--

CREATE TABLE `claims` (
  `ID` bigint(20) NOT NULL,
  `Col1` varchar(255) DEFAULT NULL,
  `Col2` varchar(255) DEFAULT NULL,
  `Col3` varchar(255) DEFAULT NULL,
  `ACC_MONTH` varchar(255) DEFAULT NULL,
  `ACC_YEAR` varchar(255) DEFAULT NULL,
  `CLAIM_NO` varchar(255) DEFAULT NULL,
  `DATE_OF_ACCIDENT` date DEFAULT NULL,
  `CRMClientRef` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `SURNAME` varchar(255) DEFAULT NULL,
  `FORENAME` varchar(255) DEFAULT NULL,
  `INS_VEH_NO` varchar(255) DEFAULT NULL,
  `INS_VEH_MAKE` varchar(255) DEFAULT NULL,
  `INS_LIABILITY` varchar(255) DEFAULT NULL,
  `INS_GARAGE` varchar(255) DEFAULT NULL,
  `INS_SURVEYOR_1` varchar(255) DEFAULT NULL,
  `INS_SURVEYOR_2` varchar(255) DEFAULT NULL,
  `INS_CAR_RENTAL` varchar(255) DEFAULT NULL,
  `TP_VEH_NO` varchar(255) DEFAULT NULL,
  `TP_TITLE` varchar(255) DEFAULT NULL,
  `TP_NAME` varchar(255) DEFAULT NULL,
  `TP_FORNAME` varchar(255) DEFAULT NULL,
  `TP_INSURANCE` varchar(255) DEFAULT NULL,
  `TP_LIABILITY` varchar(255) DEFAULT NULL,
  `TP_GARAGE` varchar(255) DEFAULT NULL,
  `TP_SURVEYOR_1` varchar(255) DEFAULT NULL,
  `TP_SURVEYOR_2` varchar(255) DEFAULT NULL,
  `TP_CAR_RENTAL` varchar(255) DEFAULT NULL,
  `STATUS` varchar(255) DEFAULT NULL,
  `case_stage_reached` varchar(255) DEFAULT NULL,
  `Claim_Count` int(11) DEFAULT NULL,
  `TP_Number` varchar(255) DEFAULT NULL,
  `INS_Driver_name` varchar(255) DEFAULT NULL,
  `INS_Driver_address_1` varchar(255) DEFAULT NULL,
  `INS_Driver_address_2` varchar(255) DEFAULT NULL,
  `INS_Driver_age` int(11) DEFAULT NULL,
  `INS_Driver_exp` varchar(255) DEFAULT NULL,
  `INS_Driver_email` varchar(255) DEFAULT NULL,
  `INS_Policy_No` varchar(255) DEFAULT NULL,
  `INS_period_of_ins_FROM` date DEFAULT NULL,
  `INS_period_of_ins_TO` date DEFAULT NULL,
  `Sum_insured` decimal(15,2) DEFAULT NULL,
  `INS_Accessories` varchar(255) DEFAULT NULL,
  `INS_Accessories_Rs` decimal(15,2) DEFAULT NULL,
  `INS_Year` varchar(255) DEFAULT NULL,
  `INS_Leasing` varchar(255) DEFAULT NULL,
  `INS_Engine_Rating` varchar(255) DEFAULT NULL,
  `INS_Comp_Excess` decimal(15,2) DEFAULT NULL,
  `INS_Vol_Excess` decimal(15,2) DEFAULT NULL,
  `INS_Special_Terms_6` varchar(255) DEFAULT NULL,
  `INS_Cert_Type` varchar(255) DEFAULT NULL,
  `INS_Cert_No` varchar(255) DEFAULT NULL,
  `INS_Incl_Reg_Fees` varchar(255) DEFAULT NULL,
  `INS_Excess_Waiver` varchar(255) DEFAULT NULL,
  `INS_Rodent` varchar(255) DEFAULT NULL,
  `INS_LOU` varchar(255) DEFAULT NULL,
  `INS_no_of_days` int(11) DEFAULT NULL,
  `INS_Limit_LOU` decimal(15,2) DEFAULT NULL,
  `INS_As_per_ASF_A_or_B` varchar(255) DEFAULT NULL,
  `TP_Driver_name` varchar(255) DEFAULT NULL,
  `TP_Address_1` varchar(255) DEFAULT NULL,
  `TP_Address_2` varchar(255) DEFAULT NULL,
  `TP_Email` varchar(255) DEFAULT NULL,
  `TP_Contact_No` varchar(255) DEFAULT NULL,
  `TP_Make_Model` varchar(255) DEFAULT NULL,
  `TP_Leasing` varchar(255) DEFAULT NULL,
  `TP_As_per_ASF_A_or_B` varchar(255) DEFAULT NULL,
  `DoA` date DEFAULT NULL,
  `ToA` time DEFAULT NULL,
  `PoA` varchar(255) DEFAULT NULL,
  `Same_as_Insured` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `ID` bigint(20) NOT NULL,
  `SwanClientRef` varchar(255) NOT NULL,
  `CRMClientRef` varchar(255) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Surname` varchar(255) DEFAULT NULL,
  `Forename` varchar(255) DEFAULT NULL,
  `Spouse_Full_Name` varchar(255) DEFAULT NULL,
  `DTClientRef` varchar(255) NOT NULL,
  `Street` varchar(255) DEFAULT NULL,
  `Street2` varchar(255) DEFAULT NULL,
  `Town` varchar(255) DEFAULT NULL,
  `ZIP_Code` varchar(255) DEFAULT NULL,
  `National_ID` varchar(255) DEFAULT NULL,
  `Date_Of_Birth` date DEFAULT NULL,
  `Nationality` varchar(255) DEFAULT NULL,
  `Passport_No` varchar(255) DEFAULT NULL,
  `Phone1` varchar(255) DEFAULT NULL,
  `Phone2` varchar(255) DEFAULT NULL,
  `Phone3` varchar(255) DEFAULT NULL,
  `Phone4` varchar(255) DEFAULT NULL,
  `Email_Address_1` varchar(255) DEFAULT NULL,
  `KYC_Indicator` varchar(255) DEFAULT NULL,
  `Employment_Status` varchar(255) DEFAULT NULL,
  `Job_Title` varchar(255) DEFAULT NULL,
  `Employer_Name` varchar(255) DEFAULT NULL,
  `Employer_Address` varchar(255) DEFAULT NULL,
  `BRN` varchar(255) DEFAULT NULL,
  `Source_of_Funds` varchar(255) DEFAULT NULL,
  `Average_monthly_income` decimal(15,2) DEFAULT NULL,
  `CONTACT_NAME` varchar(255) DEFAULT NULL,
  `CONTACT_TITLE` varchar(255) DEFAULT NULL,
  `CONTACT_FORNAME` varchar(255) DEFAULT NULL,
  `CONTACT_Phone1` varchar(255) DEFAULT NULL,
  `CONTACT_EMAIL` varchar(255) DEFAULT NULL,
  `CONTACT_Phone2` varchar(255) DEFAULT NULL,
  `CONTACT_Phone3` varchar(255) DEFAULT NULL,
  `CONTACT_Phone4` varchar(255) DEFAULT NULL,
  `Prospect_Number` varchar(255) NOT NULL,
  `Client_Status` varchar(255) DEFAULT NULL,
  `Contact_Details_modif` varchar(255) DEFAULT NULL,
  `Personal_details_modif` varchar(255) DEFAULT NULL,
  `Employement_modif` varchar(255) DEFAULT NULL,
  `Driving_Licence` varchar(255) DEFAULT NULL,
  `Marital_Status` varchar(255) DEFAULT NULL,
  `Children` varchar(255) DEFAULT NULL,
  `Client_Since` date DEFAULT NULL,
  `Contact_Remarks` varchar(255) DEFAULT NULL,
  `Driving_Remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déclencheurs `clients`
--
DELIMITER $$
CREATE TRIGGER `before_client_insert_crm` BEFORE INSERT ON `clients` FOR EACH ROW BEGIN
    DECLARE new_ref VARCHAR(255);
    DECLARE ref_exists INT;
    DECLARE ref_length INT DEFAULT 8;

    IF NEW.CRMClientRef IS NULL THEN
        -- Generate "CRM" prefix + 8 digits or more
        SET new_ref = CONCAT('CRM', LPAD(FLOOR(RAND() * POW(10, ref_length)), ref_length, '0'));
        SET ref_exists = (SELECT COUNT(*) FROM clients WHERE CRMClientRef = new_ref);

        -- Increase length if needed, up to 252 digits (255 - 3 for "CRM")
        WHILE ref_exists > 0 AND ref_length < 252 DO
            SET ref_length = ref_length + 1;
            SET new_ref = CONCAT('CRM', LPAD(FLOOR(RAND() * POW(10, ref_length)), ref_length, '0'));
            SET ref_exists = (SELECT COUNT(*) FROM clients WHERE CRMClientRef = new_ref);
        END WHILE;

        -- If still not unique, signal an error
        IF ref_exists > 0 THEN
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Unable to generate a unique CRMClientRef';
        END IF;

        SET NEW.CRMClientRef = new_ref;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_client_insert_dt` BEFORE INSERT ON `clients` FOR EACH ROW BEGIN
    DECLARE new_ref VARCHAR(255);
    DECLARE ref_exists_dt INT;
    DECLARE ref_exists_prospect INT;
    DECLARE ref_length INT DEFAULT 8;

    IF NEW.DTClientRef IS NULL OR NEW.Prospect_Number IS NULL THEN
        -- Generate 8 digits or more
        SET new_ref = LPAD(FLOOR(RAND() * POW(10, ref_length)), ref_length, '0');
        SET ref_exists_dt = (SELECT COUNT(*) FROM clients WHERE DTClientRef = CONCAT('P', new_ref));
        SET ref_exists_prospect = (SELECT COUNT(*) FROM clients WHERE Prospect_Number = new_ref);

        -- Increase length if needed, up to 254 digits (255 - 1 for "P")
        WHILE (ref_exists_dt > 0 OR ref_exists_prospect > 0) AND ref_length < 254 DO
            SET ref_length = ref_length + 1;
            SET new_ref = LPAD(FLOOR(RAND() * POW(10, ref_length)), ref_length, '0');
            SET ref_exists_dt = (SELECT COUNT(*) FROM clients WHERE DTClientRef = CONCAT('P', new_ref));
            SET ref_exists_prospect = (SELECT COUNT(*) FROM clients WHERE Prospect_Number = new_ref);
        END WHILE;

        -- If still not unique, signal an error
        IF ref_exists_dt > 0 OR ref_exists_prospect > 0 THEN
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Unable to generate a unique DTClientRef or Prospect_Number';
        END IF;

        -- Set DTClientRef and Prospect_Number if not provided
        IF NEW.DTClientRef IS NULL THEN
            SET NEW.DTClientRef = CONCAT('P', new_ref);
        END IF;
        IF NEW.Prospect_Number IS NULL THEN
            SET NEW.Prospect_Number = new_ref;
        END IF;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_client_insert_swan` BEFORE INSERT ON `clients` FOR EACH ROW BEGIN
    DECLARE new_ref VARCHAR(255);
    DECLARE ref_exists INT;
    DECLARE ref_length INT DEFAULT 8;

    IF NEW.SwanClientRef IS NULL THEN
        -- Generate 8 digits or more (no "P" prefix for auto-generated)
        SET new_ref = LPAD(FLOOR(RAND() * POW(10, ref_length)), ref_length, '0');
        SET ref_exists = (SELECT COUNT(*) FROM clients WHERE SwanClientRef = new_ref);

        -- Increase length if needed, up to 255 digits
        WHILE ref_exists > 0 AND ref_length < 255 DO
            SET ref_length = ref_length + 1;
            SET new_ref = LPAD(FLOOR(RAND() * POW(10, ref_length)), ref_length, '0');
            SET ref_exists = (SELECT COUNT(*) FROM clients WHERE SwanClientRef = new_ref);
        END WHILE;

        -- If still not unique, signal an error
        IF ref_exists > 0 THEN
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Unable to generate a unique SwanClientRef';
        END IF;

        SET NEW.SwanClientRef = new_ref;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_insert_clients` BEFORE INSERT ON `clients` FOR EACH ROW BEGIN
    IF NEW.CRMClientRef IS NULL THEN
        SET NEW.CRMClientRef = CONCAT('CRM', LPAD((SELECT COALESCE(MAX(CAST(SUBSTRING(CRMClientRef, 4) AS UNSIGNED)) + 1, 10000001) FROM clients), 8, '0'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `debtors`
--

CREATE TABLE `debtors` (
  `ID` bigint(20) NOT NULL,
  `CRMClientRef` varchar(255) DEFAULT NULL,
  `RECEIPT_DATE` date DEFAULT NULL,
  `TRANSACT` varchar(255) DEFAULT NULL,
  `POLICY_NUM` varchar(255) DEFAULT NULL,
  `PLACING_NUM` varchar(255) DEFAULT NULL,
  `RECEIPT_NUM` varchar(255) DEFAULT NULL,
  `MODE_OF_PAYMENT` varchar(255) DEFAULT NULL,
  `Transaction_Ref` varchar(255) DEFAULT NULL,
  `Amount` decimal(15,2) DEFAULT NULL,
  `CLIENT_NAME` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `debtors`
--

INSERT INTO `debtors` (`ID`, `CRMClientRef`, `RECEIPT_DATE`, `TRANSACT`, `POLICY_NUM`, `PLACING_NUM`, `RECEIPT_NUM`, `MODE_OF_PAYMENT`, `Transaction_Ref`, `Amount`, `CLIENT_NAME`) VALUES
(5, NULL, '2025-05-22', 'NEW', '10001', 'PL-3001', 'REC1747904312781_PAY1', 'Cash', 'REC_PAY1_1747904314325', 0.02, 'forename BASSOO'),
(6, NULL, '2025-05-22', 'NEW', '10001', 'PL-3001', 'REC1747904427425_PAY1', 'Cash', 'REC_PAY1_1747904427997', 0.02, 'forename BASSOO'),
(7, NULL, '2025-05-22', 'NEW', '10001', 'PL-3002', 'REC1747905430656_PAY1', 'Cash', 'REC_PAY1_1747905431916', 0.02, 'forename BASSOO'),
(8, NULL, '2025-05-22', 'NEW', '10002', 'PL-3003', 'REC1747906071562_PAY1', 'Cash', 'REC_PAY1_1747906072499', 0.08, 'forename BASSOO'),
(9, NULL, '2025-05-22', 'NEW', '10003', 'PL-3004', 'REC1747910645738_PAY1', 'Cash', 'REC_PAY1_1747910648274', 0.08, 'forename BASSOO');

-- --------------------------------------------------------

--
-- Structure de la table `docs`
--

CREATE TABLE `docs` (
  `ID` bigint(20) NOT NULL,
  `CRMClientRef` varchar(255) DEFAULT NULL,
  `CRMFile` varchar(255) DEFAULT NULL,
  `DocName` varchar(255) DEFAULT NULL,
  `DocPol` varchar(255) DEFAULT NULL,
  `DocInstruction` varchar(255) DEFAULT NULL,
  `DocShortName` varchar(255) DEFAULT NULL,
  `base64File` text DEFAULT NULL,
  `filePath` text DEFAULT NULL,
  `DocDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `docs`
--

INSERT INTO `docs` (`ID`, `CRMClientRef`, `CRMFile`, `DocName`, `DocPol`, `DocInstruction`, `DocShortName`, `base64File`, `filePath`, `DocDate`) VALUES
(142, 'CRM51782863', '2025_InstructionForm.pdf', NULL, '10001', NULL, 'policy_swan', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_policy_swan_1747901993.pdf', '2025-05-22 00:00:00'),
(143, 'CRM51782863', '2025_InstructionForm.pdf', NULL, '10001', NULL, 'policy_swan', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_policy_swan_1747903104.pdf', '2025-05-22 00:00:00'),
(144, 'CRM51782863', 'POLICY_CRM51782863_10001_05_2025_InstructionForm_Office.pdf', NULL, '10001', NULL, 'policy_office', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_policy_office_1747903105.pdf', '2025-05-22 00:00:00'),
(145, 'CRM51782863', '2025_Receipt(Office).pdf', NULL, '10001', NULL, 'receipt_office', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_receipt_office_1747903105.pdf', '2025-05-22 00:00:00'),
(146, 'CRM51782863', 'RECEIPT_CRM51782863_10001_05_2025_Client.pdf', NULL, '10001', NULL, 'receipt_client', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_receipt_client_1747903106.pdf', '2025-05-22 00:00:00'),
(147, 'CRM51782863', '2025_Receipt(Office).pdf', NULL, '10001', NULL, 'receipt_office', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_receipt_office_1747903396.pdf', '2025-05-22 00:00:00'),
(148, 'CRM51782863', 'POLICY_CRM51782863_10001_05_2025_InstructionForm_Office.pdf', NULL, '10001', NULL, 'policy_office', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_policy_office_1747903397.pdf', '2025-05-22 00:00:00'),
(149, 'CRM51782863', '2025_InstructionForm.pdf', NULL, '10001', NULL, 'policy_swan', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_policy_swan_1747903398.pdf', '2025-05-22 00:00:00'),
(150, 'CRM51782863', 'RECEIPT_CRM51782863_10001_05_2025_Client.pdf', NULL, '10001', NULL, 'receipt_client', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_receipt_client_1747903398.pdf', '2025-05-22 00:00:00'),
(151, 'CRM51782863', 'POLICY_CRM51782863_10001_05_2025_InstructionForm_Office.pdf', NULL, '10001', NULL, 'policy_office', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_policy_office_1747904308.pdf', '2025-05-22 00:00:00'),
(152, 'CRM51782863', 'RECEIPT_CRM51782863_10001_05_2025_Client.pdf', NULL, '10001', NULL, 'receipt_client', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_receipt_client_1747904309.pdf', '2025-05-22 00:00:00'),
(153, 'CRM51782863', '2025_Receipt(Office).pdf', NULL, '10001', NULL, 'receipt_office', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_receipt_office_1747904309.pdf', '2025-05-22 00:00:00'),
(154, 'CRM51782863', '2025_InstructionForm.pdf', NULL, '10001', NULL, 'policy_swan', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_policy_swan_1747904310.pdf', '2025-05-22 00:00:00'),
(155, 'CRM51782863', 'POLICY_CRM51782863_10001_05_2025_InstructionForm_Office.pdf', NULL, '10001', NULL, 'policy_office', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_policy_office_1747904422.pdf', '2025-05-22 00:00:00'),
(156, 'CRM51782863', '2025_Receipt(Office).pdf', NULL, '10001', NULL, 'receipt_office', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_receipt_office_1747904423.pdf', '2025-05-22 00:00:00'),
(157, 'CRM51782863', '2025_InstructionForm.pdf', NULL, '10001', NULL, 'policy_swan', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_policy_swan_1747904424.pdf', '2025-05-22 00:00:00'),
(158, 'CRM51782863', 'RECEIPT_CRM51782863_10001_05_2025_Client.pdf', NULL, '10001', NULL, 'receipt_client', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_receipt_client_1747904425.pdf', '2025-05-22 00:00:00'),
(159, 'CRM51782863', 'POLICY_CRM51782863_10001_05_2025_InstructionForm_Office.pdf', NULL, '10001', NULL, 'policy_office', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_policy_office_1747905424.pdf', '2025-05-22 00:00:00'),
(160, 'CRM51782863', '2025_InstructionForm.pdf', NULL, '10001', NULL, 'policy_swan', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_policy_swan_1747905426.pdf', '2025-05-22 00:00:00'),
(161, 'CRM51782863', 'RECEIPT_CRM51782863_10001_05_2025_Client.pdf', NULL, '10001', NULL, 'receipt_client', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_receipt_client_1747905427.pdf', '2025-05-22 00:00:00'),
(162, 'CRM51782863', '2025_Receipt(Office).pdf', NULL, '10001', NULL, 'receipt_office', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_receipt_office_1747905427.pdf', '2025-05-22 00:00:00'),
(163, 'CRM51782863', '2025_InstructionForm.pdf', NULL, '10002', NULL, 'policy_swan', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_policy_swan_1747906065.pdf', '2025-05-22 00:00:00'),
(164, 'CRM51782863', '2025_Receipt(Office).pdf', NULL, '10002', NULL, 'receipt_office', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_receipt_office_1747906067.pdf', '2025-05-22 00:00:00'),
(165, 'CRM51782863', 'RECEIPT_CRM51782863_10002_05_2025_Client.pdf', NULL, '10002', NULL, 'receipt_client', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_receipt_client_1747906068.pdf', '2025-05-22 00:00:00'),
(166, 'CRM51782863', 'POLICY_CRM51782863_10002_05_2025_InstructionForm_Office.pdf', NULL, '10002', NULL, 'policy_office', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_policy_office_1747906068.pdf', '2025-05-22 00:00:00'),
(167, 'CRM51782863', 'POLICY_CRM51782863_10003_05_2025_InstructionForm_Office.pdf', NULL, '10003', NULL, 'policy_office', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_policy_office_1747910630.pdf', '2025-05-22 00:00:00'),
(168, 'CRM51782863', '2025_Receipt(Office).pdf', NULL, '10003', NULL, 'receipt_office', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_receipt_office_1747910636.pdf', '2025-05-22 00:00:00'),
(169, 'CRM51782863', 'RECEIPT_CRM51782863_10003_05_2025_Client.pdf', NULL, '10003', NULL, 'receipt_client', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_receipt_client_1747910637.pdf', '2025-05-22 00:00:00'),
(170, 'CRM51782863', '2025_InstructionForm.pdf', NULL, '10003', NULL, 'policy_swan', NULL, 'D:\\PROJET\\backend/storage/uploads/policy/CRM51782863_policy_swan_1747910638.pdf', '2025-05-22 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `family`
--

CREATE TABLE `family` (
  `id` int(11) NOT NULL,
  `CRMClientRef` varchar(255) NOT NULL,
  `type` enum('Spouse','Child') NOT NULL,
  `surname` varchar(100) NOT NULL,
  `forename` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `instructions`
--

CREATE TABLE `instructions` (
  `ID` bigint(20) NOT NULL,
  `ACC_MONTH` varchar(255) DEFAULT NULL,
  `ACC_YEAR` varchar(255) DEFAULT NULL,
  `PLACING_NUMBER` varchar(255) DEFAULT NULL,
  `TRANSACT` varchar(255) DEFAULT NULL,
  `POLICY_NUM` varchar(255) DEFAULT NULL,
  `DATE_FROM` date DEFAULT NULL,
  `DATE_TO` date DEFAULT NULL,
  `PREMIUM` decimal(15,2) DEFAULT NULL,
  `FEES` decimal(15,2) DEFAULT NULL,
  `TOTAL_PREMIUM` decimal(15,2) DEFAULT NULL,
  `CASH_CREDIT` varchar(255) DEFAULT NULL,
  `REGISTRATION_NUMBER` varchar(255) DEFAULT NULL,
  `INDICATOR` varchar(255) DEFAULT NULL,
  `CRMClientRef` varchar(255) DEFAULT NULL,
  `POLICY_HOLDER` varchar(255) DEFAULT NULL,
  `SWAN_ACC_MONTH` varchar(255) DEFAULT NULL,
  `SWAN_SERIAL_NUM` varchar(255) DEFAULT NULL,
  `SWAN_PREMIUM` decimal(15,2) DEFAULT NULL,
  `REMARKS1` varchar(255) DEFAULT NULL,
  `DISCREPANCY` varchar(255) DEFAULT NULL,
  `REMARKS2` varchar(255) DEFAULT NULL,
  `SWAN_REMARKS` varchar(255) DEFAULT NULL,
  `DT_REMARKS` varchar(255) DEFAULT NULL,
  `SENT_TO_SWAN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `missing_documents`
--

CREATE TABLE `missing_documents` (
  `ID` bigint(20) NOT NULL,
  `Instruction` varchar(255) DEFAULT NULL,
  `Renewal` varchar(255) DEFAULT NULL,
  `Missing_KYC` varchar(255) DEFAULT NULL,
  `Missing_Docs` varchar(255) DEFAULT NULL,
  `Sent_To_Swan` varchar(255) DEFAULT NULL,
  `Processed` varchar(255) DEFAULT NULL,
  `Missing_EIC` varchar(255) DEFAULT NULL,
  `CRMClientRef` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `name_autocorrect_save_failures`
--

CREATE TABLE `name_autocorrect_save_failures` (
  `ID` bigint(20) NOT NULL,
  `Object_Name` varchar(255) DEFAULT NULL,
  `Object_Type` varchar(255) DEFAULT NULL,
  `Failure_Reason` varchar(255) DEFAULT NULL,
  `Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paste_errors`
--

CREATE TABLE `paste_errors` (
  `ID` bigint(20) NOT NULL,
  `CRMClientRef` varchar(255) DEFAULT NULL,
  `CRMFile` varchar(255) DEFAULT NULL,
  `DocName` varchar(255) DEFAULT NULL,
  `DocPol` varchar(255) DEFAULT NULL,
  `DocInstruction` varchar(255) DEFAULT NULL,
  `DocShortName` varchar(255) DEFAULT NULL,
  `DocDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE `payments` (
  `ID` bigint(20) NOT NULL,
  `POLICY_NUM` varchar(255) DEFAULT NULL,
  `SwanClientRef` varchar(255) DEFAULT NULL,
  `ACC_MONTH` varchar(255) DEFAULT NULL,
  `ACC_YEAR` varchar(255) DEFAULT NULL,
  `PLACING_NUMBER` varchar(255) DEFAULT NULL,
  `PAYMENT_NUMBER` varchar(255) DEFAULT NULL,
  `MODE_OF_PAYMENT` varchar(255) DEFAULT NULL,
  `DUE_DATE` date DEFAULT NULL,
  `AMOUNT_DUE` decimal(15,2) DEFAULT NULL,
  `PAID_DATE` date DEFAULT NULL,
  `AMOUNT_PAID` decimal(15,2) DEFAULT NULL,
  `CRMClientRef` varchar(255) DEFAULT NULL,
  `Transaction` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `policies`
--

CREATE TABLE `policies` (
  `ID` bigint(20) NOT NULL,
  `QB_INV_NUM` varchar(255) DEFAULT NULL,
  `SwanClientRef` varchar(255) DEFAULT NULL,
  `FULLNAME` varchar(255) DEFAULT NULL,
  `POLICY` varchar(255) DEFAULT NULL,
  `DATE_FROM` date DEFAULT NULL,
  `DATE_TO` date DEFAULT NULL,
  `PREMIUM` decimal(15,2) DEFAULT NULL,
  `CASH_CREDIT_TRANSAC` varchar(255) DEFAULT NULL,
  `REGISTRATION_NUMBER` varchar(255) DEFAULT NULL,
  `SUM_INSURED` decimal(15,2) DEFAULT NULL,
  `GROSS_PREMIUM` decimal(15,2) DEFAULT NULL,
  `RATE` decimal(5,2) DEFAULT NULL,
  `EXCESS` decimal(15,2) DEFAULT NULL,
  `NET_PREMIUM` decimal(15,2) DEFAULT NULL,
  `ACC_MONTH` varchar(255) DEFAULT NULL,
  `ACC_YEAR` varchar(255) DEFAULT NULL,
  `PLACING_NUMBER` varchar(255) DEFAULT NULL,
  `CRMClientRef` varchar(255) DEFAULT NULL,
  `Transact` varchar(255) DEFAULT NULL,
  `motor_certificate` varchar(255) DEFAULT NULL,
  `make_model` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL,
  `body_type` varchar(255) DEFAULT NULL,
  `DAYS_LOU` int(11) DEFAULT NULL,
  `LIMIT_LOU` decimal(15,2) DEFAULT NULL,
  `AIC` varchar(255) DEFAULT NULL,
  `NAFEW` varchar(255) DEFAULT NULL,
  `type_of_insurance` varchar(255) DEFAULT NULL,
  `type_of_cover` varchar(255) DEFAULT NULL,
  `make` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `Introducer` varchar(255) DEFAULT NULL,
  `Leasing` varchar(255) DEFAULT NULL,
  `Lien` varchar(255) DEFAULT NULL,
  `TRASAC_DATE` date DEFAULT NULL,
  `Field37` varchar(255) DEFAULT NULL,
  `Field38` varchar(255) DEFAULT NULL,
  `Field39` varchar(255) DEFAULT NULL,
  `Field40` varchar(255) DEFAULT NULL,
  `Field41` varchar(255) DEFAULT NULL,
  `Field42` varchar(255) DEFAULT NULL,
  `Field43` varchar(255) DEFAULT NULL,
  `QB_Client_Name` varchar(255) DEFAULT NULL,
  `Exported_to_QB` varchar(255) DEFAULT NULL,
  `Sent_to_Swan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déclencheurs `policies`
--
DELIMITER $$
CREATE TRIGGER `generate_placing_number` BEFORE INSERT ON `policies` FOR EACH ROW BEGIN
    DECLARE max_placing_num BIGINT;
    DECLARE new_placing_num VARCHAR(255);
    
    -- Vérifier si PLACING_NUMBER est NULL ou vide
    IF NEW.PLACING_NUMBER IS NULL OR NEW.PLACING_NUMBER = '' THEN
        -- Trouver le plus grand numéro dans PLACING_NUMBER (en ignorant le préfixe PL-)
        SELECT COALESCE(
            MAX(CAST(SUBSTRING(PLACING_NUMBER, 4) AS UNSIGNED)), 
            3000
        ) INTO max_placing_num
        FROM `policies`
        WHERE PLACING_NUMBER REGEXP '^PL-[0-9]+$';
        
        -- Incrémenter et formater avec le préfixe PL-
        SET new_placing_num = CONCAT('PL-', LPAD(max_placing_num + 1, 4, '0'));
        SET NEW.PLACING_NUMBER = new_placing_num;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `generate_policy_num` BEFORE INSERT ON `policies` FOR EACH ROW BEGIN
    DECLARE max_policy_num BIGINT;
    DECLARE new_policy_num VARCHAR(255);
    
    -- Vérifier si POLICY est NULL ou vide
    IF NEW.POLICY IS NULL OR NEW.POLICY = '' THEN
        -- Trouver le plus grand numéro dans POLICY
        SELECT COALESCE(
            MAX(CAST(POLICY AS UNSIGNED)), 
            10000
        ) INTO max_policy_num
        FROM `policies`
        WHERE POLICY REGEXP '^[0-9]+$';
        
        -- Incrémenter
        SET new_policy_num = CAST(max_policy_num + 1 AS CHAR);
        SET NEW.POLICY = new_policy_num;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `generate_qb_inv_num` BEFORE INSERT ON `policies` FOR EACH ROW BEGIN
    DECLARE max_inv_num BIGINT;
    DECLARE new_inv_num VARCHAR(255);
    
    -- Vérifier si QB_INV_NUM est NULL ou vide
    IF NEW.QB_INV_NUM IS NULL OR NEW.QB_INV_NUM = '' THEN
        -- Trouver le plus grand numéro dans QB_INV_NUM (en ignorant le préfixe INV-)
        SELECT COALESCE(
            MAX(CAST(SUBSTRING(QB_INV_NUM, 5) AS UNSIGNED)), 
            20000
        ) INTO max_inv_num
        FROM `policies`
        WHERE QB_INV_NUM REGEXP '^INV-[0-9]+$';
        
        -- Incrémenter et formater avec le préfixe INV-
        SET new_inv_num = CONCAT('INV-', LPAD(max_inv_num + 1, 5, '0'));
        SET NEW.QB_INV_NUM = new_inv_num;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

CREATE TABLE `profile` (
  `ID` bigint(20) NOT NULL,
  `USER` varchar(255) DEFAULT NULL,
  `PROFILE` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `receipts`
--

CREATE TABLE `receipts` (
  `ID` bigint(20) NOT NULL,
  `CRMClientRef` varchar(255) DEFAULT NULL,
  `RECEIPT_NUM` varchar(255) DEFAULT NULL,
  `RECEIPT_DATE` date DEFAULT NULL,
  `Amount_in_letter` varchar(255) DEFAULT NULL,
  `Amount_in_Numbers` decimal(15,2) DEFAULT NULL,
  `DATE_FROM` date DEFAULT NULL,
  `DATE_TO` date DEFAULT NULL,
  `REGISTRATION_NUMBER` varchar(255) DEFAULT NULL,
  `POLICY_NUM` varchar(255) DEFAULT NULL,
  `MODE_OF_PAYMENT` varchar(255) DEFAULT NULL,
  `BANK_CHEQUE_NUM` varchar(255) DEFAULT NULL,
  `REMARKS` varchar(255) DEFAULT NULL,
  `CLIENT_NAME` varchar(255) DEFAULT NULL,
  `LOGDMENT` varchar(255) DEFAULT NULL,
  `LODGMENT_DATE` date DEFAULT NULL,
  `Field16` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déclencheurs `receipts`
--
DELIMITER $$
CREATE TRIGGER `generate_receipt_num` BEFORE INSERT ON `receipts` FOR EACH ROW BEGIN
    DECLARE receipt_index INT;
    
    -- Compter le nombre de reçus existants pour le même client et la même police
    SELECT COUNT(*) + 1 INTO receipt_index
    FROM receipts
    WHERE CRMClientRef = NEW.CRMClientRef
    AND POLICY_NUM = NEW.POLICY_NUM;
    
    -- Générer le RECEIPT_NUM avec le format REC{timestamp}_PAY{index}
    SET NEW.RECEIPT_NUM = CONCAT('REC', UNIX_TIMESTAMP(), '_PAY', receipt_index);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `renewals`
--

CREATE TABLE `renewals` (
  `ID` bigint(20) NOT NULL,
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  `POLRSK` varchar(255) DEFAULT NULL,
  `POLCD` varchar(255) DEFAULT NULL,
  `POLSER` varchar(255) DEFAULT NULL,
  `AGENCY` varchar(255) DEFAULT NULL,
  `MOTPLAN` varchar(255) DEFAULT NULL,
  `CLIENT` varchar(255) DEFAULT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `DTFROM` date DEFAULT NULL,
  `DTTO` date DEFAULT NULL,
  `REGNO` varchar(255) DEFAULT NULL,
  `MODEL` varchar(255) DEFAULT NULL,
  `GRP` varchar(255) DEFAULT NULL,
  `HPCC` varchar(255) DEFAULT NULL,
  `USED` varchar(255) DEFAULT NULL,
  `INS` varchar(255) DEFAULT NULL,
  `YR` varchar(255) DEFAULT NULL,
  `EXCESS` decimal(15,2) DEFAULT NULL,
  `SUM` decimal(15,2) DEFAULT NULL,
  `SUMS_VEH` decimal(15,2) DEFAULT NULL,
  `SUMS_TRL` decimal(15,2) DEFAULT NULL,
  `PREV_RATE` decimal(5,2) DEFAULT NULL,
  `PREV_PREM` decimal(15,2) DEFAULT NULL,
  `NEW_RATE` decimal(5,2) DEFAULT NULL,
  `LOADING` decimal(5,2) DEFAULT NULL,
  `OTHER_INS_DISC` decimal(5,2) DEFAULT NULL,
  `LOADING1` decimal(5,2) DEFAULT NULL,
  `BASIC` decimal(15,2) DEFAULT NULL,
  `L_USE` varchar(255) DEFAULT NULL,
  `AIC` varchar(255) DEFAULT NULL,
  `DACC` varchar(255) DEFAULT NULL,
  `ALLOYPREM` decimal(15,2) DEFAULT NULL,
  `FGAPPREM` decimal(15,2) DEFAULT NULL,
  `REPCARPREM` decimal(15,2) DEFAULT NULL,
  `XSWAIVPREM` decimal(15,2) DEFAULT NULL,
  `PASTERPREM` decimal(15,2) DEFAULT NULL,
  `RODENTPREM` decimal(15,2) DEFAULT NULL,
  `TOTAL` decimal(15,2) DEFAULT NULL,
  `PREMIUM` decimal(15,2) DEFAULT NULL,
  `POLICY_FEE` decimal(15,2) DEFAULT NULL,
  `FSC_FEE` decimal(15,2) DEFAULT NULL,
  `PAYABLE` decimal(15,2) DEFAULT NULL,
  `REMARKS` varchar(255) DEFAULT NULL,
  `REVISED_SUM_INSURED` decimal(15,2) DEFAULT NULL,
  `REVISED_PREMIUM` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `successors`
--

CREATE TABLE `successors` (
  `id` bigint(20) NOT NULL,
  `CRMClientRef` varchar(255) NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `surname` varchar(100) NOT NULL,
  `forename` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone1` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `phone3` varchar(20) DEFAULT NULL,
  `phone4` varchar(20) DEFAULT NULL,
  `email_address_1` varchar(100) DEFAULT NULL,
  `contact_remarks` text DEFAULT NULL,
  `is_authorized` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acc_monthyear`
--
ALTER TABLE `acc_monthyear`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_APPOINTMENT_CLIENT` (`client_id`);

--
-- Index pour la table `authorisation`
--
ALTER TABLE `authorisation`
  ADD PRIMARY KEY (`ID_auth`),
  ADD KEY `fk_authorisation_clients_crmclientref` (`CRMClientRef`);

--
-- Index pour la table `bon_emission`
--
ALTER TABLE `bon_emission`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CLAIM_NO` (`CLAIM_NO`),
  ADD KEY `CRMClientRef` (`CRMClientRef`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CRMClientRef` (`CRMClientRef`),
  ADD UNIQUE KEY `SwanClientRef` (`SwanClientRef`),
  ADD UNIQUE KEY `DTClientRef` (`DTClientRef`),
  ADD UNIQUE KEY `Prospect_Number` (`Prospect_Number`);

--
-- Index pour la table `debtors`
--
ALTER TABLE `debtors`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CRMClientRef` (`CRMClientRef`);

--
-- Index pour la table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CRMClientRef` (`CRMClientRef`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_family_clients` (`CRMClientRef`);

--
-- Index pour la table `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CRMClientRef` (`CRMClientRef`),
  ADD KEY `POLICY_NUM` (`POLICY_NUM`);

--
-- Index pour la table `missing_documents`
--
ALTER TABLE `missing_documents`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CRMClientRef` (`CRMClientRef`);

--
-- Index pour la table `name_autocorrect_save_failures`
--
ALTER TABLE `name_autocorrect_save_failures`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `paste_errors`
--
ALTER TABLE `paste_errors`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CRMClientRef` (`CRMClientRef`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CRMClientRef` (`CRMClientRef`),
  ADD KEY `POLICY_NUM` (`POLICY_NUM`);

--
-- Index pour la table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CRMClientRef` (`CRMClientRef`),
  ADD KEY `idx_policy` (`POLICY`);

--
-- Index pour la table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `RECEIPT_NUM` (`RECEIPT_NUM`),
  ADD KEY `CRMClientRef` (`CRMClientRef`),
  ADD KEY `POLICY_NUM` (`POLICY_NUM`);

--
-- Index pour la table `renewals`
--
ALTER TABLE `renewals`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `POLSER` (`POLSER`);

--
-- Index pour la table `successors`
--
ALTER TABLE `successors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_successors_CRMClientRef` (`CRMClientRef`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acc_monthyear`
--
ALTER TABLE `acc_monthyear`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `authorisation`
--
ALTER TABLE `authorisation`
  MODIFY `ID_auth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `bon_emission`
--
ALTER TABLE `bon_emission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `claims`
--
ALTER TABLE `claims`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT pour la table `debtors`
--
ALTER TABLE `debtors`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `docs`
--
ALTER TABLE `docs`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT pour la table `family`
--
ALTER TABLE `family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `missing_documents`
--
ALTER TABLE `missing_documents`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `name_autocorrect_save_failures`
--
ALTER TABLE `name_autocorrect_save_failures`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paste_errors`
--
ALTER TABLE `paste_errors`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `policies`
--
ALTER TABLE `policies`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT pour la table `profile`
--
ALTER TABLE `profile`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT pour la table `renewals`
--
ALTER TABLE `renewals`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `successors`
--
ALTER TABLE `successors`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `FK_APPOINTMENT_CLIENT` FOREIGN KEY (`client_id`) REFERENCES `clients` (`ID`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `authorisation`
--
ALTER TABLE `authorisation`
  ADD CONSTRAINT `fk_authorisation_clients_crmclientref` FOREIGN KEY (`CRMClientRef`) REFERENCES `clients` (`CRMClientRef`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `claims`
--
ALTER TABLE `claims`
  ADD CONSTRAINT `claims_ibfk_1` FOREIGN KEY (`CRMClientRef`) REFERENCES `clients` (`CRMClientRef`) ON DELETE SET NULL;

--
-- Contraintes pour la table `debtors`
--
ALTER TABLE `debtors`
  ADD CONSTRAINT `debtors_ibfk_1` FOREIGN KEY (`CRMClientRef`) REFERENCES `clients` (`CRMClientRef`) ON DELETE SET NULL;

--
-- Contraintes pour la table `family`
--
ALTER TABLE `family`
  ADD CONSTRAINT `fk_family_clients` FOREIGN KEY (`CRMClientRef`) REFERENCES `clients` (`CRMClientRef`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `instructions`
--
ALTER TABLE `instructions`
  ADD CONSTRAINT `instructions_ibfk_1` FOREIGN KEY (`CRMClientRef`) REFERENCES `clients` (`CRMClientRef`) ON DELETE SET NULL,
  ADD CONSTRAINT `instructions_ibfk_2` FOREIGN KEY (`POLICY_NUM`) REFERENCES `policies` (`POLICY`) ON DELETE SET NULL;

--
-- Contraintes pour la table `missing_documents`
--
ALTER TABLE `missing_documents`
  ADD CONSTRAINT `missing_documents_ibfk_1` FOREIGN KEY (`CRMClientRef`) REFERENCES `clients` (`CRMClientRef`) ON DELETE SET NULL;

--
-- Contraintes pour la table `paste_errors`
--
ALTER TABLE `paste_errors`
  ADD CONSTRAINT `paste_errors_ibfk_1` FOREIGN KEY (`CRMClientRef`) REFERENCES `clients` (`CRMClientRef`) ON DELETE SET NULL;

--
-- Contraintes pour la table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`CRMClientRef`) REFERENCES `clients` (`CRMClientRef`) ON DELETE SET NULL,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`POLICY_NUM`) REFERENCES `policies` (`POLICY`) ON DELETE SET NULL;

--
-- Contraintes pour la table `policies`
--
ALTER TABLE `policies`
  ADD CONSTRAINT `policies_ibfk_1` FOREIGN KEY (`CRMClientRef`) REFERENCES `clients` (`CRMClientRef`) ON DELETE SET NULL;

--
-- Contraintes pour la table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_ibfk_1` FOREIGN KEY (`CRMClientRef`) REFERENCES `clients` (`CRMClientRef`) ON DELETE SET NULL,
  ADD CONSTRAINT `receipts_ibfk_2` FOREIGN KEY (`POLICY_NUM`) REFERENCES `policies` (`POLICY`) ON DELETE SET NULL;

--
-- Contraintes pour la table `renewals`
--
ALTER TABLE `renewals`
  ADD CONSTRAINT `renewals_ibfk_1` FOREIGN KEY (`POLSER`) REFERENCES `policies` (`POLICY`) ON DELETE SET NULL;

--
-- Contraintes pour la table `successors`
--
ALTER TABLE `successors`
  ADD CONSTRAINT `successors_ibfk_1` FOREIGN KEY (`CRMClientRef`) REFERENCES `clients` (`CRMClientRef`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

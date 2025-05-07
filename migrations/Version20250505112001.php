<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250505112001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE acc_monthyear (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) DEFAULT NULL, acc_month VARCHAR(255) DEFAULT NULL, acc_year VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE claims (id INT AUTO_INCREMENT NOT NULL, col1 VARCHAR(255) DEFAULT NULL, col2 VARCHAR(255) DEFAULT NULL, col3 VARCHAR(255) DEFAULT NULL, acc_month VARCHAR(255) DEFAULT NULL, claim_no VARCHAR(255) DEFAULT NULL, date_of_accident DOUBLE PRECISION DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, surname VARCHAR(255) DEFAULT NULL, forename VARCHAR(255) DEFAULT NULL, ins_veh_no VARCHAR(255) DEFAULT NULL, ins_veh_make VARCHAR(255) DEFAULT NULL, ins_liability VARCHAR(255) DEFAULT NULL, ins_garage VARCHAR(255) DEFAULT NULL, ins_surveyor1 VARCHAR(255) DEFAULT NULL, ins_surveyor2 VARCHAR(255) DEFAULT NULL, ins_car_rental VARCHAR(255) DEFAULT NULL, tp_veh_no VARCHAR(255) DEFAULT NULL, tp_title VARCHAR(255) DEFAULT NULL, tp_name VARCHAR(255) DEFAULT NULL, tp_forname VARCHAR(255) DEFAULT NULL, tp_insurance VARCHAR(255) DEFAULT NULL, tp_liability VARCHAR(255) DEFAULT NULL, tp_garage VARCHAR(255) DEFAULT NULL, tp_surveyor1 VARCHAR(255) DEFAULT NULL, tp_surveyor2 VARCHAR(255) DEFAULT NULL, tp_car_rental VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, case_stage_reached VARCHAR(255) DEFAULT NULL, claim_count DOUBLE PRECISION DEFAULT NULL, tp_number VARCHAR(255) DEFAULT NULL, ins_driver_name VARCHAR(255) DEFAULT NULL, ins_driver_address1 VARCHAR(255) DEFAULT NULL, ins_driver_address2 VARCHAR(255) DEFAULT NULL, ins_driver_age VARCHAR(255) DEFAULT NULL, ins_driver_exp VARCHAR(255) DEFAULT NULL, ins_driver_email VARCHAR(255) DEFAULT NULL, ins_policy_no VARCHAR(255) DEFAULT NULL, ins_period_of_ins_from VARCHAR(255) DEFAULT NULL, ins_period_of_ins_to VARCHAR(255) DEFAULT NULL, sum_insured VARCHAR(255) DEFAULT NULL, ins_accessories VARCHAR(255) DEFAULT NULL, ins_accessories_rs VARCHAR(255) DEFAULT NULL, ins_year VARCHAR(255) DEFAULT NULL, ins_leasing VARCHAR(255) DEFAULT NULL, ins_engine_rating VARCHAR(255) DEFAULT NULL, ins_comp_excess VARCHAR(255) DEFAULT NULL, ins_vol_excess VARCHAR(255) DEFAULT NULL, ins_special_terms6 VARCHAR(255) DEFAULT NULL, ins_cert_type VARCHAR(255) DEFAULT NULL, ins_cert_no VARCHAR(255) DEFAULT NULL, ins_inopian_fees VARCHAR(255) DEFAULT NULL, ins_excess_waiver VARCHAR(255) DEFAULT NULL, ins_rodent VARCHAR(255) DEFAULT NULL, ins_lou VARCHAR(255) DEFAULT NULL, ins_no_of_days VARCHAR(255) DEFAULT NULL, ins_limit_lou VARCHAR(255) DEFAULT NULL, ins_as_per_asf_aor_b VARCHAR(255) DEFAULT NULL, tp_driver_name VARCHAR(255) DEFAULT NULL, tp_address1 VARCHAR(255) DEFAULT NULL, tp_address2 VARCHAR(255) DEFAULT NULL, tp_email VARCHAR(255) DEFAULT NULL, tp_contact_no VARCHAR(255) DEFAULT NULL, tp_make_model VARCHAR(255) DEFAULT NULL, tp_leasing VARCHAR(255) DEFAULT NULL, tp_as_per_asf_aor_b VARCHAR(255) DEFAULT NULL, doa VARCHAR(255) DEFAULT NULL, toa VARCHAR(255) DEFAULT NULL, poa VARCHAR(255) DEFAULT NULL, same_as_insured VARCHAR(255) DEFAULT NULL, CRMClientRef VARCHAR(50) NOT NULL, INDEX IDX_BEA313BE40CE09C5 (CRMClientRef), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, crm_client_ref VARCHAR(50) NOT NULL, swan_client_ref VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, surname VARCHAR(255) DEFAULT NULL, forename VARCHAR(255) DEFAULT NULL, spouse_full_name VARCHAR(255) DEFAULT NULL, dt_client_ref VARCHAR(255) DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, street2 VARCHAR(255) DEFAULT NULL, town VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, national_id VARCHAR(255) DEFAULT NULL, date_of_birth VARCHAR(255) DEFAULT NULL, nationality VARCHAR(255) DEFAULT NULL, passport_no VARCHAR(255) DEFAULT NULL, phone1 VARCHAR(255) DEFAULT NULL, phone2 VARCHAR(255) DEFAULT NULL, phone3 VARCHAR(255) DEFAULT NULL, phone4 VARCHAR(255) DEFAULT NULL, email_address1 VARCHAR(255) DEFAULT NULL, kyc_indicator VARCHAR(255) DEFAULT NULL, employment_status VARCHAR(255) DEFAULT NULL, job_title VARCHAR(255) DEFAULT NULL, employer_name VARCHAR(255) DEFAULT NULL, employer_address VARCHAR(255) DEFAULT NULL, brn VARCHAR(255) DEFAULT NULL, source_of_funds VARCHAR(255) DEFAULT NULL, average_monthly_income VARCHAR(255) DEFAULT NULL, contact_name VARCHAR(255) DEFAULT NULL, contact_title VARCHAR(255) DEFAULT NULL, contact_forname VARCHAR(255) DEFAULT NULL, contact_phone1 VARCHAR(255) DEFAULT NULL, contact_email VARCHAR(255) DEFAULT NULL, contact_phone2 VARCHAR(255) DEFAULT NULL, contact_phone3 VARCHAR(255) DEFAULT NULL, contact_phone4 VARCHAR(255) DEFAULT NULL, prospect_number VARCHAR(255) DEFAULT NULL, client_status VARCHAR(255) DEFAULT NULL, contact_details_modif VARCHAR(255) DEFAULT NULL, personal_details_modif VARCHAR(255) DEFAULT NULL, employment_modif VARCHAR(255) DEFAULT NULL, driving_licence VARCHAR(255) DEFAULT NULL, marital_status VARCHAR(255) DEFAULT NULL, children VARCHAR(255) DEFAULT NULL, client_since VARCHAR(255) DEFAULT NULL, contact_remarks VARCHAR(255) DEFAULT NULL, driving_remarks VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C82E7476559B8F (crm_client_ref), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE debtors (id INT AUTO_INCREMENT NOT NULL, receipt_date DOUBLE PRECISION DEFAULT NULL, transact VARCHAR(255) DEFAULT NULL, receipt_num VARCHAR(255) DEFAULT NULL, mode_of_payment VARCHAR(255) DEFAULT NULL, transaction_ref VARCHAR(255) DEFAULT NULL, amount DOUBLE PRECISION DEFAULT NULL, client_name VARCHAR(255) DEFAULT NULL, CRMClientRef VARCHAR(50) NOT NULL, POLICY_NUM VARCHAR(50) NOT NULL, PLACING_NUM VARCHAR(50) DEFAULT NULL, INDEX IDX_2A8D8D6840CE09C5 (CRMClientRef), INDEX IDX_2A8D8D686E103B9A (POLICY_NUM), INDEX IDX_2A8D8D68D19DAD41 (PLACING_NUM), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE docs (id INT AUTO_INCREMENT NOT NULL, crm_file VARCHAR(255) DEFAULT NULL, doc_name VARCHAR(255) DEFAULT NULL, doc_instruction VARCHAR(255) DEFAULT NULL, doc_short_name VARCHAR(255) DEFAULT NULL, doc_date VARCHAR(255) DEFAULT NULL, CRMClientRef VARCHAR(50) NOT NULL, DocPol VARCHAR(50) NOT NULL, INDEX IDX_51572BB740CE09C5 (CRMClientRef), INDEX IDX_51572BB7DD272503 (DocPol), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE instructions (id INT AUTO_INCREMENT NOT NULL, acc_month VARCHAR(255) DEFAULT NULL, transact VARCHAR(255) DEFAULT NULL, date_from DOUBLE PRECISION DEFAULT NULL, date_to DOUBLE PRECISION DEFAULT NULL, premium DOUBLE PRECISION DEFAULT NULL, fees DOUBLE PRECISION DEFAULT NULL, total_premium DOUBLE PRECISION DEFAULT NULL, cash_credit VARCHAR(255) DEFAULT NULL, registration_number VARCHAR(255) DEFAULT NULL, indicator VARCHAR(255) DEFAULT NULL, policy_holder VARCHAR(255) DEFAULT NULL, swan_acc_month VARCHAR(255) DEFAULT NULL, swan_serial_num DOUBLE PRECISION DEFAULT NULL, swan_premium DOUBLE PRECISION DEFAULT NULL, remarks1 VARCHAR(255) DEFAULT NULL, discrepancy DOUBLE PRECISION DEFAULT NULL, remarks2 VARCHAR(255) DEFAULT NULL, swan_remarks VARCHAR(255) DEFAULT NULL, dt_remarks VARCHAR(255) DEFAULT NULL, sent_to_swan VARCHAR(255) DEFAULT NULL, CRMClientRef VARCHAR(50) NOT NULL, POLICY_NUM VARCHAR(50) NOT NULL, PLACING_NUMBER VARCHAR(50) DEFAULT NULL, INDEX IDX_997D812B40CE09C5 (CRMClientRef), INDEX IDX_997D812B6E103B9A (POLICY_NUM), INDEX IDX_997D812B607BC15F (PLACING_NUMBER), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE missing_documents (id INT AUTO_INCREMENT NOT NULL, instruction VARCHAR(255) DEFAULT NULL, renewal VARCHAR(255) DEFAULT NULL, missing_kyc VARCHAR(255) DEFAULT NULL, missing_docs VARCHAR(255) DEFAULT NULL, sent_to_swan INT DEFAULT NULL, processed VARCHAR(255) DEFAULT NULL, missing_eic VARCHAR(255) DEFAULT NULL, CRMClientRef VARCHAR(50) NOT NULL, INDEX IDX_F0EDF74B40CE09C5 (CRMClientRef), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE name_autocorrect_save_failures (object_name VARCHAR(255) NOT NULL, time DATETIME NOT NULL, object_type VARCHAR(255) DEFAULT NULL, failure_reason VARCHAR(255) DEFAULT NULL, INDEX name_autocorrect_pk (Object_Name, Time), PRIMARY KEY(object_name, time)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE paste_errors (id INT AUTO_INCREMENT NOT NULL, crm_file VARCHAR(255) DEFAULT NULL, doc_name VARCHAR(255) DEFAULT NULL, doc_instruction VARCHAR(255) DEFAULT NULL, doc_short_name VARCHAR(255) DEFAULT NULL, doc_date VARCHAR(255) DEFAULT NULL, CRMClientRef VARCHAR(50) NOT NULL, DocPol VARCHAR(50) NOT NULL, INDEX IDX_BEF1671E40CE09C5 (CRMClientRef), INDEX IDX_BEF1671EDD272503 (DocPol), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE payments (id INT AUTO_INCREMENT NOT NULL, acc_month DOUBLE PRECISION DEFAULT NULL, swan_client_ref VARCHAR(255) DEFAULT NULL, payment_number VARCHAR(255) DEFAULT NULL, mode_of_payment VARCHAR(255) DEFAULT NULL, due_date DOUBLE PRECISION DEFAULT NULL, amount_due DOUBLE PRECISION DEFAULT NULL, paid_date VARCHAR(255) DEFAULT NULL, amount_paid VARCHAR(255) DEFAULT NULL, transaction VARCHAR(255) DEFAULT NULL, CRMClientRef VARCHAR(50) NOT NULL, POLICY_NUM VARCHAR(50) NOT NULL, PLACING_NUMBER VARCHAR(50) DEFAULT NULL, INDEX IDX_65D29B3240CE09C5 (CRMClientRef), INDEX IDX_65D29B326E103B9A (POLICY_NUM), INDEX IDX_65D29B32607BC15F (PLACING_NUMBER), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE policies (id INT AUTO_INCREMENT NOT NULL, policy VARCHAR(50) NOT NULL, qb_inv_num VARCHAR(255) DEFAULT NULL, swan_client_ref VARCHAR(255) DEFAULT NULL, fullname VARCHAR(255) DEFAULT NULL, date_from VARCHAR(255) DEFAULT NULL, date_to VARCHAR(255) DEFAULT NULL, premium DOUBLE PRECISION DEFAULT NULL, cash_credit_transac VARCHAR(255) DEFAULT NULL, registration_number VARCHAR(255) DEFAULT NULL, sum_insured VARCHAR(255) DEFAULT NULL, gross_premium DOUBLE PRECISION DEFAULT NULL, rate VARCHAR(255) DEFAULT NULL, excess VARCHAR(255) DEFAULT NULL, net_premium VARCHAR(255) DEFAULT NULL, acc_month VARCHAR(255) DEFAULT NULL, placing_number VARCHAR(50) DEFAULT NULL, transact VARCHAR(255) DEFAULT NULL, motor_certificate VARCHAR(255) DEFAULT NULL, make_model VARCHAR(255) DEFAULT NULL, year VARCHAR(255) DEFAULT NULL, month VARCHAR(255) DEFAULT NULL, hp VARCHAR(255) DEFAULT NULL, body_type VARCHAR(255) DEFAULT NULL, days_lou VARCHAR(255) DEFAULT NULL, limit_lou VARCHAR(255) DEFAULT NULL, aic VARCHAR(255) DEFAULT NULL, nafew VARCHAR(255) DEFAULT NULL, type_of_insurance VARCHAR(255) DEFAULT NULL, type_of_cover VARCHAR(255) DEFAULT NULL, make VARCHAR(255) DEFAULT NULL, model VARCHAR(255) DEFAULT NULL, introducer VARCHAR(255) DEFAULT NULL, leasing VARCHAR(255) DEFAULT NULL, lien VARCHAR(255) DEFAULT NULL, trasac_date VARCHAR(255) DEFAULT NULL, field37 VARCHAR(255) DEFAULT NULL, field38 VARCHAR(255) DEFAULT NULL, field39 VARCHAR(255) DEFAULT NULL, field40 VARCHAR(255) DEFAULT NULL, field41 VARCHAR(255) DEFAULT NULL, field42 VARCHAR(255) DEFAULT NULL, field43 VARCHAR(255) DEFAULT NULL, qb_client_name VARCHAR(255) DEFAULT NULL, exported_to_qb VARCHAR(255) DEFAULT NULL, sent_to_swan VARCHAR(255) DEFAULT NULL, CRMClientRef VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_E08BBFCEF07D0516 (policy), INDEX IDX_E08BBFCE40CE09C5 (CRMClientRef), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, user VARCHAR(255) DEFAULT NULL, profile VARCHAR(255) DEFAULT NULL, password INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE receipts (id INT AUTO_INCREMENT NOT NULL, receipt_num VARCHAR(255) DEFAULT NULL, receipt_date DOUBLE PRECISION DEFAULT NULL, amount_in_letter VARCHAR(255) DEFAULT NULL, amount_in_numbers DOUBLE PRECISION DEFAULT NULL, date_from VARCHAR(255) DEFAULT NULL, date_to VARCHAR(255) DEFAULT NULL, registration_number VARCHAR(255) DEFAULT NULL, mode_of_payment VARCHAR(255) DEFAULT NULL, bank_cheque_num VARCHAR(255) DEFAULT NULL, remarks VARCHAR(255) DEFAULT NULL, client_name VARCHAR(255) DEFAULT NULL, lodgment VARCHAR(255) DEFAULT NULL, lodgment_date DOUBLE PRECISION DEFAULT NULL, field16 DOUBLE PRECISION DEFAULT NULL, CRMClientRef VARCHAR(50) NOT NULL, POLICY_NUM VARCHAR(50) NOT NULL, INDEX IDX_1DEBE3A240CE09C5 (CRMClientRef), INDEX IDX_1DEBE3A26E103B9A (POLICY_NUM), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE renewals (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) DEFAULT NULL, polrsk VARCHAR(255) DEFAULT NULL, polcd VARCHAR(255) DEFAULT NULL, polser VARCHAR(255) DEFAULT NULL, agency VARCHAR(255) DEFAULT NULL, motplan VARCHAR(255) DEFAULT NULL, client VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, dtfrom DOUBLE PRECISION DEFAULT NULL, dtto DOUBLE PRECISION DEFAULT NULL, regno VARCHAR(255) DEFAULT NULL, model VARCHAR(255) DEFAULT NULL, grp DOUBLE PRECISION DEFAULT NULL, hpcc DOUBLE PRECISION DEFAULT NULL, used DOUBLE PRECISION DEFAULT NULL, ins VARCHAR(255) DEFAULT NULL, yr DOUBLE PRECISION DEFAULT NULL, excess DOUBLE PRECISION DEFAULT NULL, sum DOUBLE PRECISION DEFAULT NULL, sums_veh DOUBLE PRECISION DEFAULT NULL, sums_trl DOUBLE PRECISION DEFAULT NULL, prev_rate DOUBLE PRECISION DEFAULT NULL, prev_prem DOUBLE PRECISION DEFAULT NULL, new_rate DOUBLE PRECISION DEFAULT NULL, loading DOUBLE PRECISION DEFAULT NULL, other_ins_disc DOUBLE PRECISION DEFAULT NULL, loading1 DOUBLE PRECISION DEFAULT NULL, basic DOUBLE PRECISION DEFAULT NULL, l_use DOUBLE PRECISION DEFAULT NULL, aic DOUBLE PRECISION DEFAULT NULL, dacc DOUBLE PRECISION DEFAULT NULL, alloyprem DOUBLE PRECISION DEFAULT NULL, fgapprem DOUBLE PRECISION DEFAULT NULL, repcarprem DOUBLE PRECISION DEFAULT NULL, xswaivprem DOUBLE PRECISION DEFAULT NULL, pasterprem DOUBLE PRECISION DEFAULT NULL, rodentprem DOUBLE PRECISION DEFAULT NULL, total DOUBLE PRECISION DEFAULT NULL, premium DOUBLE PRECISION DEFAULT NULL, policy_fee DOUBLE PRECISION DEFAULT NULL, fsc_fee DOUBLE PRECISION DEFAULT NULL, payable DOUBLE PRECISION DEFAULT NULL, remarks VARCHAR(255) DEFAULT NULL, revised_sum_insured DOUBLE PRECISION DEFAULT NULL, revised_premium DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE claims ADD CONSTRAINT FK_BEA313BE40CE09C5 FOREIGN KEY (CRMClientRef) REFERENCES clients (crmClientRef) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE debtors ADD CONSTRAINT FK_2A8D8D6840CE09C5 FOREIGN KEY (CRMClientRef) REFERENCES clients (crmClientRef) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE debtors ADD CONSTRAINT FK_2A8D8D686E103B9A FOREIGN KEY (POLICY_NUM) REFERENCES policies (policy) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE debtors ADD CONSTRAINT FK_2A8D8D68D19DAD41 FOREIGN KEY (PLACING_NUM) REFERENCES policies (placingNumber) ON DELETE SET NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE docs ADD CONSTRAINT FK_51572BB740CE09C5 FOREIGN KEY (CRMClientRef) REFERENCES clients (crmClientRef) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE docs ADD CONSTRAINT FK_51572BB7DD272503 FOREIGN KEY (DocPol) REFERENCES policies (policy) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE instructions ADD CONSTRAINT FK_997D812B40CE09C5 FOREIGN KEY (CRMClientRef) REFERENCES clients (crmClientRef) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE instructions ADD CONSTRAINT FK_997D812B6E103B9A FOREIGN KEY (POLICY_NUM) REFERENCES policies (policy) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE instructions ADD CONSTRAINT FK_997D812B607BC15F FOREIGN KEY (PLACING_NUMBER) REFERENCES policies (placingNumber) ON DELETE SET NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE missing_documents ADD CONSTRAINT FK_F0EDF74B40CE09C5 FOREIGN KEY (CRMClientRef) REFERENCES clients (crmClientRef) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE paste_errors ADD CONSTRAINT FK_BEF1671E40CE09C5 FOREIGN KEY (CRMClientRef) REFERENCES clients (crmClientRef) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE paste_errors ADD CONSTRAINT FK_BEF1671EDD272503 FOREIGN KEY (DocPol) REFERENCES policies (policy) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payments ADD CONSTRAINT FK_65D29B3240CE09C5 FOREIGN KEY (CRMClientRef) REFERENCES clients (crmClientRef) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payments ADD CONSTRAINT FK_65D29B326E103B9A FOREIGN KEY (POLICY_NUM) REFERENCES policies (policy) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payments ADD CONSTRAINT FK_65D29B32607BC15F FOREIGN KEY (PLACING_NUMBER) REFERENCES policies (placingNumber) ON DELETE SET NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE policies ADD CONSTRAINT FK_E08BBFCE40CE09C5 FOREIGN KEY (CRMClientRef) REFERENCES clients (crmClientRef) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE receipts ADD CONSTRAINT FK_1DEBE3A240CE09C5 FOREIGN KEY (CRMClientRef) REFERENCES clients (crmClientRef) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE receipts ADD CONSTRAINT FK_1DEBE3A26E103B9A FOREIGN KEY (POLICY_NUM) REFERENCES policies (policy) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE claims DROP FOREIGN KEY FK_BEA313BE40CE09C5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE debtors DROP FOREIGN KEY FK_2A8D8D6840CE09C5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE debtors DROP FOREIGN KEY FK_2A8D8D686E103B9A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE debtors DROP FOREIGN KEY FK_2A8D8D68D19DAD41
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE docs DROP FOREIGN KEY FK_51572BB740CE09C5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE docs DROP FOREIGN KEY FK_51572BB7DD272503
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE instructions DROP FOREIGN KEY FK_997D812B40CE09C5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE instructions DROP FOREIGN KEY FK_997D812B6E103B9A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE instructions DROP FOREIGN KEY FK_997D812B607BC15F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE missing_documents DROP FOREIGN KEY FK_F0EDF74B40CE09C5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE paste_errors DROP FOREIGN KEY FK_BEF1671E40CE09C5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE paste_errors DROP FOREIGN KEY FK_BEF1671EDD272503
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payments DROP FOREIGN KEY FK_65D29B3240CE09C5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payments DROP FOREIGN KEY FK_65D29B326E103B9A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payments DROP FOREIGN KEY FK_65D29B32607BC15F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE policies DROP FOREIGN KEY FK_E08BBFCE40CE09C5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE receipts DROP FOREIGN KEY FK_1DEBE3A240CE09C5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE receipts DROP FOREIGN KEY FK_1DEBE3A26E103B9A
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE acc_monthyear
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE claims
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE clients
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE debtors
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE docs
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE instructions
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE missing_documents
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE name_autocorrect_save_failures
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE paste_errors
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE payments
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE policies
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE profile
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE receipts
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE renewals
        SQL);
    }
}

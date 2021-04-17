--Procedures for get user company registrations
DROP PROCEDURE sp_getcompanyregistration;
DELIMITER $$
CREATE PROCEDURE `sp_getcompanyregistration`(in userid int)
BEGIN
    SELECT company.company_name, registration.* FROM (
      SELECT id, company_name FROM erp_maintain_companies 
      WHERE user_id = userid
    ) AS company JOIN (
      SELECT * FROM erp_company_registrations
    ) AS registration ON registration.company_id = company.id;
END$$
DELIMITER ;

--Procedure for get company office
DROP PROCEDURE sp_getcompanyoffice;
DELIMITER $$
CREATE PROCEDURE `sp_getcompanyoffice`(in userid int)
BEGIN
    SELECT company.company_name, offices.* FROM (
      SELECT id, company_name FROM erp_maintain_companies 
      WHERE user_id = userid
    ) AS company JOIN (
      SELECT * FROM erp_maintain_offices
    ) AS offices ON offices.company_id = company.id;
END$$
DELIMITER ;

--Procedure for get company departments
DROP PROCEDURE sp_getcompanydepartments;
DELIMITER $$
CREATE PROCEDURE `sp_getcompanydepartments`(in userid int)
BEGIN
    SELECT company.company_name, office.office_name, department.* FROM(
      SELECT id, user_id, company_name 
      FROM erp_maintain_companies 
      WHERE user_id = userid
    ) AS company JOIN(
      SELECT id, company_id, office_name 
      FROM erp_maintain_offices
    ) AS office ON office.company_id = company.id JOIN(
      SELECT * FROM erp_maintain_departments
    ) AS department ON department.office_id = office.id;
END$$
DELIMITER ;

--Procedure for get company calenders
DROP PROCEDURE sp_getcompanycalenders;
DELIMITER $$
CREATE PROCEDURE `sp_getcompanycalenders`(in userid int)
BEGIN
    SELECT  calender.*, company.company_name, office.office_name, dept.department_name FROM (
      SELECT id, user_id, company_name 
      FROM erp_maintain_companies 
      WHERE user_id = userid
    ) AS company JOIN (
      SELECT id, company_id, office_name 
      FROM erp_maintain_offices
    ) AS office ON office.company_id = company.id JOIN (
      SELECT id, office_id, department_name 
      FROM erp_maintain_departments
    ) AS dept ON dept.office_id = office.id JOIN (
      SELECT * FROM erp_maintain_calenders
    ) AS calender ON calender.department_id = dept.id;
END$$
DELIMITER ;


--Procedure for get company calenders
DROP PROCEDURE sp_getcompanyshifts;
DELIMITER $$
CREATE PROCEDURE `sp_getcompanyshifts`(in userid int)
BEGIN
    SELECT  shifts.*, company.company_name, office.office_name, dept.department_name FROM (
      SELECT id, user_id, company_name 
      FROM erp_maintain_companies 
      WHERE user_id = userid
    ) AS company JOIN (
      SELECT id, company_id, office_name 
      FROM erp_maintain_offices
    ) AS office ON office.company_id = company.id JOIN (
      SELECT id, office_id, department_name 
      FROM erp_maintain_departments
    ) AS dept ON dept.office_id = office.id JOIN (
      SELECT * FROM erp_maintain_shifts
    ) AS shifts ON shifts.department_id = dept.id;
END$$
DELIMITER ;

--Procedure for get company calenders
DROP PROCEDURE sp_getemployeegroups;
DELIMITER $$
CREATE PROCEDURE `sp_getemployeegroups`(in userid int)
BEGIN
    SELECT groups.*, company.company_name, office.office_name, dept.department_name FROM (
      SELECT id, name 
      FROM erp_users WHERE id = userid
    )AS user JOIN (
      SELECT id, user_id, company_name 
      FROM erp_maintain_companies
    )AS company ON company.user_id = user.id JOIN(
      SELECT id, company_id, office_name 
      FROM erp_maintain_offices
    )AS office ON office.company_id = company.id JOIN(
      SELECT id, office_id, department_name 
      FROM erp_maintain_departments
    )AS dept ON dept.office_id = office.id JOIN(
      SELECT * FROM erp_employee_groups
    )AS groups ON groups.department_id = dept.id;
END$$
DELIMITER ;


--Procedure for get office account heads
DROP PROCEDURE sp_getaccountheads;
DELIMITER $$
CREATE PROCEDURE `sp_getaccountheads`(in userid int)
BEGIN
    SELECT acc_cat.*, office.office_name, company.company_name, user.name FROM(
      SELECT id, name  FROM erp_users WHERE id = userid
    ) AS user JOIN (
      SELECT id, user_id, company_name FROM erp_maintain_companies
    ) AS company ON company.user_id = user.id JOIN(
      SELECT id, company_id, office_name FROM erp_maintain_offices
    ) AS office ON office.company_id = company.id JOIN (
      SELECT * FROM erp_account_categories WHERE account_id IN(10000, 20000)
    )AS acc_cat ON acc_cat.office_id = office.id;
END$$
DELIMITER ;
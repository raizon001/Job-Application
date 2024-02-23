DELIMITER //

CREATE PROCEDURE DeleteJobVacancyByName(
    IN p_name VARCHAR(255)
)
BEGIN
    -- Your delete logic here
    DELETE FROM job_vacancies
    WHERE position = p_name;
END //

DELIMITER ;

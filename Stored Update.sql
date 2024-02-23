DELIMITER //

CREATE PROCEDURE UpdateJobVacancyByName(
    IN p_name VARCHAR(255),
    IN p_newPosition VARCHAR(255),
    IN p_newDescription TEXT
)
BEGIN
    -- Your update logic here
    UPDATE job_vacancies
    SET position = p_newPosition, description = p_newDescription
    WHERE position = p_name;
END //

DELIMITER ;

-- Create the 'vacancies' database
CREATE DATABASE IF NOT EXISTS vacancies;

-- Switch to the 'vacancies' database
USE vacancies;

-- Create the 'job_vacancies' table
CREATE TABLE IF NOT EXISTS job_vacancies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    position VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    photo VARCHAR(255) NOT NULL
);

-- Sample data (you can remove this part if not needed)
INSERT INTO job_vacancies (position, description, photo) VALUES
('Software Engineer', 'Join our dynamic software engineering team.', 'software_engineer.jpg'),
('Marketing Specialist', 'Exciting opportunity for a creative marketing professional.', 'marketing_specialist.jpg'),
('Data Analyst', 'Analytical minds wanted for our data analysis team.', 'data_analyst.jpg');

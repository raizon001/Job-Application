CREATE TABLE form (
    id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(255) NOT NULL,
    email_address VARCHAR(255) NOT NULL,
    job_role VARCHAR(50) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    tor_file VARCHAR(255) NOT NULL,
    resume_file VARCHAR(255) NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

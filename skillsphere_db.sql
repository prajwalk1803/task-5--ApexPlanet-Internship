-- SkillSphere Database
CREATE DATABASE IF NOT EXISTS skillsphere_db;
USE skillsphere_db;

CREATE TABLE users(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(120) UNIQUE,
  password VARCHAR(255),
  otp VARCHAR(10),
  is_verified TINYINT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE courses(
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150),
  category VARCHAR(100),
  description TEXT,
  price INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE enrollments(
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  course_id INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE(user_id,course_id)
);

CREATE TABLE jobs(
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150),
  company VARCHAR(150),
  location VARCHAR(100),
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE job_applications(
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  job_id INT,
  status VARCHAR(50),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE(user_id,job_id)
);

INSERT INTO courses(title,category,description,price) VALUES
('Full Stack Web Development','Web','Learn HTML CSS JS PHP MySQL',499),
('Data Analytics','Data','Excel, SQL, PowerBI, Python basics',599),
('UI/UX Design Masterclass','Design','Modern UI/UX with Figma',399);

INSERT INTO jobs(title,company,location,description) VALUES
('PHP Developer Intern','ApexPlanet','Pune','Work on PHP + MySQL projects'),
('Frontend Developer','TechNova','Mumbai','HTML CSS JS React'),
('Data Analyst Intern','InsightAI','Bangalore','PowerBI + SQL + Python');

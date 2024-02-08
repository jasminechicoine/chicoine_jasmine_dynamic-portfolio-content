-- Create the 'projects' table
CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    image_url VARCHAR(255)
);

-- Insert data into the 'projects' table
INSERT INTO projects (title, description, image_url) VALUES
    ('Project 1', 'Description for Project 1', 'project1.jpg'),
    ('Project 2', 'Description for Project 2', 'project2.jpg'),
    ('Project 3', 'Description for Project 3', 'project3.jpg');


-- Create the 'media' table
CREATE TABLE IF NOT EXISTS media (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT,
    image_filename VARCHAR(255) NOT NULL,
    FOREIGN KEY (project_id) REFERENCES projects(id) 
    ON DELETE CASCADE
) ENGINE=InnoDB;

-- Insert data into the 'media' table
INSERT INTO media (project_id, image_filename) VALUES
    (1, 'project1_image1.jpg'),
    (1, 'project1_image2.jpg'),
    (1, 'project1_image3.jpg'),
    (2, 'project2_image1.jpg'),
    (2, 'project2_image2.jpg'),
    (2, 'project2_image3.jpg'),
    (3, 'project3_image1.jpg'),
    (3, 'project3_image2.jpg'),
    (3, 'project3_image3.jpg');
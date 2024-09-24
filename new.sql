-- Drop tables if they already exist
DROP TABLE IF EXISTS projects;
DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS images;
DROP TABLE IF EXISTS skills;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS certificates;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS testimonials;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS role_has_permissions;
DROP TABLE IF EXISTS model_has_permissions;
DROP TABLE IF EXISTS model_has_roles;
DROP TABLE IF EXISTS permissions;
DROP TABLE IF EXISTS source_code;
DROP TABLE IF EXISTS user_subscriptions;
DROP TABLE IF EXISTS payments;
DROP TABLE IF EXISTS ebooks;
DROP TABLE IF EXISTS subscribe_me;
DROP TABLE IF EXISTS ratings;
DROP TABLE IF EXISTS reviews;
DROP TABLE IF EXISTS audit_log;

-- Create Users table
CREATE TABLE users (
  id_user BIGINT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  role BIGINT NOT NULL,
  profile_picture TEXT,
  name VARCHAR(50) NOT NULL,
  date_of_birth DATE NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  phone_number VARCHAR(50),
  address TEXT NOT NULL,
  postal_code VARCHAR(10),
  city VARCHAR(50),
  district VARCHAR(50),
  village VARCHAR(50),
  rt VARCHAR(5),
  rw VARCHAR(5),
  username VARCHAR(100) NOT NULL UNIQUE,
  password TEXT NOT NULL,
  status INT NOT NULL,
  last_login DATETIME
);

-- Create Projects table
CREATE TABLE projects (
  id_project INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  cover TEXT NOT NULL,
  project_type VARCHAR(30) NOT NULL,
  title VARCHAR(200) NOT NULL,
  slug VARCHAR(100) NOT NULL,
  project_url VARCHAR(100),
  description TEXT NOT NULL,
  tools_used TEXT NOT NULL,
  status ENUM('pending', 'completed', 'in-progress') NOT NULL,
  view_count INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create Messages table
CREATE TABLE messages (
  id_message BIGINT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  user_id BIGINT NOT NULL,
  name VARCHAR(30) NOT NULL,
  email VARCHAR(50) NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_message_user FOREIGN KEY (user_id) REFERENCES users(id_user) ON DELETE CASCADE
);

-- Create Images table
CREATE TABLE images (
  id_image INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  project_id INT NOT NULL,
  image TEXT NOT NULL,
  CONSTRAINT fk_image_project FOREIGN KEY (project_id) REFERENCES projects(id_project) ON DELETE CASCADE
);

-- Create Skills table
CREATE TABLE skills (
  id_skill INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  skill_name VARCHAR(50) NOT NULL,
  skill_level ENUM('beginner', 'intermediate', 'advanced') NOT NULL,
  skill_type VARCHAR(30) NOT NULL
);

-- Create Certificates table
CREATE TABLE certificates (
  id_certificate INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  user_id BIGINT NOT NULL,
  course_name VARCHAR(100) NOT NULL,
  certificate_image TEXT NOT NULL,
  certificate_title VARCHAR(100) NOT NULL,
  slug VARCHAR(100) NOT NULL,
  certificate_link VARCHAR(255),
  CONSTRAINT fk_certificate_user FOREIGN KEY (user_id) REFERENCES users(id_user) ON DELETE CASCADE
);

-- Create Categories table
CREATE TABLE categories (
  id_category INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  category_name VARCHAR(30) NOT NULL,
  slug VARCHAR(30) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create Posts table
CREATE TABLE posts (
  id_post INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  user_id BIGINT NOT NULL,
  category_id INT NOT NULL,
  title VARCHAR(100) NOT NULL,
  image TEXT,
  content TEXT NOT NULL,
  view_count INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_post_user FOREIGN KEY (user_id) REFERENCES users(id_user) ON DELETE CASCADE,
  CONSTRAINT fk_post_category FOREIGN KEY (category_id) REFERENCES categories(id_category)
);

-- Create Comments table
CREATE TABLE comments (
  id_comment INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  post_id INT NOT NULL,
  user_id BIGINT NOT NULL,
  comment TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_comment_post FOREIGN KEY (post_id) REFERENCES posts(id_post) ON DELETE CASCADE,
  CONSTRAINT fk_comment_user FOREIGN KEY (user_id) REFERENCES users(id_user) ON DELETE CASCADE
);

-- Create Testimonials table
CREATE TABLE testimonials (
  id_testimonial INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  project_id INT NOT NULL,
  client_name VARCHAR(50) NOT NULL,
  client_image TEXT,
  feedback TEXT NOT NULL,
  CONSTRAINT fk_testimonial_project FOREIGN KEY (project_id) REFERENCES projects(id_project) ON DELETE CASCADE
);



-- Create Ratings table
CREATE TABLE ratings (
  id_rating INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  user_id BIGINT NOT NULL,
  entity_id INT NOT NULL, -- ID of the rated entity (e.g., project, post)
  entity_type ENUM('project', 'post') NOT NULL, -- Type of entity rated
  rating_value DECIMAL(3, 2) NOT NULL, -- Rating value (e.g., 1-5)
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_rating_user FOREIGN KEY (user_id) REFERENCES users(id_user) ON DELETE CASCADE
);

-- Create Reviews table
CREATE TABLE reviews (
  id_review INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  user_id BIGINT NOT NULL,
  entity_id INT NOT NULL, -- ID of the reviewed entity (e.g., project, post)
  entity_type ENUM('project', 'post') NOT NULL, -- Type of entity reviewed
  review_text TEXT NOT NULL, -- The review content
  rating_value DECIMAL(3, 2), -- Optional, for review with ratings
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_review_user FOREIGN KEY (user_id) REFERENCES users(id_user) ON DELETE CASCADE
);

-- Create Source Code table
CREATE TABLE source_code (
  id_source_code INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  cover TEXT NOT NULL,
  title VARCHAR(100) NOT NULL,
  programming_language TEXT NOT NULL,
  framework TEXT NOT NULL,
  version VARCHAR(30) NOT NULL,
  status ENUM('active', 'inactive') NOT NULL
);

-- Create User Subscriptions table
CREATE TABLE user_subscriptions (
  id_subscription INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  user_id BIGINT NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_subscription_user FOREIGN KEY (user_id) REFERENCES users(id_user) ON DELETE CASCADE
);

-- Create Payments table
CREATE TABLE payments (
  id_payment INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  subscription_id INT NOT NULL,
  amount DECIMAL(10, 2) NOT NULL,
  payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  payment_method VARCHAR(50),
  status ENUM('pending', 'completed', 'failed'),
  CONSTRAINT fk_payment_subscription FOREIGN KEY (subscription_id) REFERENCES user_subscriptions(id_subscription) ON DELETE CASCADE
);

-- Create Ebooks table
CREATE TABLE ebooks (
  id_ebook INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  cover TEXT NOT NULL,
  title VARCHAR(100) NOT NULL,
  file TEXT NOT NULL,
  status ENUM('available', 'unavailable') NOT NULL
);

-- Create Subscribe Me table
CREATE TABLE subscribe_me (
  id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  status ENUM('active', 'inactive') NOT NULL
);

-- Create Audit Log table
CREATE TABLE audit_log (
  id_log INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  user_id BIGINT NOT NULL,
  entity_type ENUM('project', 'post', 'comment', 'review') NOT NULL,
  entity_id INT NOT NULL,
  action ENUM('create', 'update', 'delete') NOT NULL,
  timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_log_user FOREIGN KEY (user_id) REFERENCES users(id_user)
);

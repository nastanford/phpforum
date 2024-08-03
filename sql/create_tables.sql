USE myforum;
-- Create USER table
CREATE TABLE USER (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    hashed_password VARCHAR(255) NOT NULL,
    join_date DATETIME NOT NULL,
    post_count INT DEFAULT 0,
    reply_count INT DEFAULT 0
);

-- Create CATEGORY table
CREATE TABLE CATEGORY (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT
);

-- Create THREAD table
CREATE TABLE THREAD (
    thread_id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    last_activity DATETIME NOT NULL,
    is_pinned BOOLEAN DEFAULT FALSE,
    is_locked BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (category_id) REFERENCES CATEGORY(category_id),
    FOREIGN KEY (user_id) REFERENCES USER(user_id)
);

-- Create POST table
CREATE TABLE POST (
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    thread_id INT NOT NULL,
    user_id INT NOT NULL,
    content TEXT NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    FOREIGN KEY (thread_id) REFERENCES THREAD(thread_id),
    FOREIGN KEY (user_id) REFERENCES USER(user_id)
);

-- Create USER_FOLLOW table
CREATE TABLE USER_FOLLOW (
    follower_id INT NOT NULL,
    followed_id INT NOT NULL,
    PRIMARY KEY (follower_id, followed_id),
    FOREIGN KEY (follower_id) REFERENCES USER(user_id),
    FOREIGN KEY (followed_id) REFERENCES USER(user_id)
);

-- Create THREAD_SUBSCRIPTION table
CREATE TABLE THREAD_SUBSCRIPTION (
    user_id INT NOT NULL,
    thread_id INT NOT NULL,
    subscribed_at DATETIME NOT NULL,
    PRIMARY KEY (user_id, thread_id),
    FOREIGN KEY (user_id) REFERENCES USER(user_id),
    FOREIGN KEY (thread_id) REFERENCES THREAD(thread_id)
);

-- Create ROLE table
CREATE TABLE ROLE (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    description TEXT
);

-- Create USER_ROLE table
CREATE TABLE USER_ROLE (
    user_id INT NOT NULL,
    role_id INT NOT NULL,
    PRIMARY KEY (user_id, role_id),
    FOREIGN KEY (user_id) REFERENCES USER(user_id),
    FOREIGN KEY (role_id) REFERENCES ROLE(role_id)
);

-- Create PRIVATE_MESSAGE table
CREATE TABLE PRIVATE_MESSAGE (
    message_id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id INT NOT NULL,
    recipient_id INT NOT NULL,
    content TEXT NOT NULL,
    sent_at DATETIME NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (sender_id) REFERENCES USER(user_id),
    FOREIGN KEY (recipient_id) REFERENCES USER(user_id)
);

-- Add indexes for improved query performance
CREATE INDEX idx_thread_category ON THREAD(category_id);
CREATE INDEX idx_thread_user ON THREAD(user_id);
CREATE INDEX idx_post_thread ON POST(thread_id);
CREATE INDEX idx_post_user ON POST(user_id);
CREATE INDEX idx_thread_subscription_thread ON THREAD_SUBSCRIPTION(thread_id);
CREATE INDEX idx_private_message_recipient ON PRIVATE_MESSAGE(recipient_id);
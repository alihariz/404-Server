-- Create the database
CREATE DATABASE IF NOT EXISTS finance_dashboard;

USE finance_dashboard;

-- Create the transactions table
CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    date DATE NOT NULL,
    description TEXT
);

-- Insert sample data
INSERT INTO transactions (category, amount, date, description) VALUES
('Groceries', 120.50, '2024-05-02', 'Weekly grocery shopping'),
('Utilities', 85.00, '2024-05-05', 'Electricity bill'),
('Freelance', 500.00, '2024-05-11', 'Website design payment');

# Support Palestine Website - PHP Backend Integration 🌍🇵🇸

## 📚 Overview

This branch introduces PHP code to connect with an SQL server, adding backend functionalities to the Support Palestine website. The new features include user authentication (sign in and sign up), donation processing, and a contact form.

## 🛠️ Features Added

- **User Authentication**: Login and signup functionality using PHP and SQL server.
- **Donation System**: Backend support for processing donations.
- **Contact Form**: A form for users to reach out via the website, with PHP handling submissions.

## 📦 Installation and Setup

### Prerequisites

Ensure you have the following set up:

- PHP 7.4 or higher
- SQL Server
- [XAMPP](https://www.apachefriends.org/index.html) or a similar PHP development environment

### Configuration

1. **Clone the repository**:

   ```bash
   git checkout -b php-backend-integration
   git pull origin php-backend-integration
   ```

2. **Database Configuration**:

   - Create a new SQL Server database.
   - Import the provided SQL scripts to set up the necessary tables.
   - Update the `config.php` file with your database credentials:

     ```php
     <?php
     $servername = "localhost";
     $username = "your_username";
     $password = "your_password";
     $dbname = "your_database_name";

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);

     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
     ?>
     ```

3. **Set Up PHP Server**:

   - Place the PHP files in your server's root directory (e.g., `htdocs` for XAMPP).
   - Access the website through your local server (e.g., `http://localhost/your_project`).

### Usage

- **sign in and sign up**:
  - Navigate to the sign in or sign up page.
  - Use the forms to create an account or log in.

- **Donate**:
  - Visit the donation page to make contributions.
  - Donations will be processed through the backend.

- **Contact Form**:
  - Fill out the contact form and submit.
  - PHP will handle the form submission and send the message to the designated email.

## 📝 Notes

- Ensure that PHP is configured correctly on your server.
- Test the functionalities thoroughly to ensure proper integration with the SQL server.

## 📄 License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## 💬 Contact

For questions or support, contact:

LinkedIn https://www.linkedin.com/in/khalid-elabd-38048820a/

---

Feel free to adjust the details as needed for your project!


---

# MyBarber

## Project Description

MyBarber is a web application designed to manage barber shop appointments and customer information. The project utilizes HTML, CSS, and JavaScript for the front end, PHP for the backend, and MySQL for the database. The application can be run on any PC using XAMPP.

## Features

- **User Registration and Login:** Allows customers to create an account and log in.
- **Appointment Booking:** Customers can book, view, and cancel appointments.
- **Admin Dashboard:** Barbershop admin can view all appointments, manage customers, and update shop information.
- **Responsive Design:** The application is accessible on various devices, including desktops, tablets, and smartphones.

## Technologies Used

- **Frontend:**
  - HTML
  - CSS
  - JavaScript

- **Backend:**
  - PHP

- **Database:**
  - MySQL

- **Development Environment:**
  - XAMPP (Apache, MySQL, PHP)

## Installation

### Prerequisites

- XAMPP (Download and install from [XAMPP official website](https://www.apachefriends.org/index.html))

### Steps to Run the Project

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/Chitransh1234/myBarber.git
   ```

2. **Start XAMPP:**
   - Open XAMPP Control Panel.
   - Start Apache and MySQL services.

3. **Setup the Database:**
   - Open phpMyAdmin by navigating to `http://localhost/phpmyadmin` in your web browser.
   - Create a new database named `mybarber`.
   - Import the database schema by uploading the `mybarber.sql` file located in the `database` folder of the cloned repository.

4. **Configure the Project:**
   - Place the cloned repository in the `htdocs` folder of your XAMPP installation (e.g., `C:\xampp\htdocs\mybarber`).
   - Open the `config.php` file located in the `includes` folder of the project.
   - Update the database configuration to match your setup:

     ```php
     <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "mybarber";
     ?>
     ```

5. **Run the Application:**
   - Open your web browser and navigate to `http://localhost/mybarber`.
   - You should see the homepage of the MyBarber application.

## Usage

1. **Register as a New User:**
   - Click on the "Register" button on the homepage.
   - Fill in the required details and submit the form.

2. **Log in as an Existing User:**
   - Click on the "Login" button on the homepage.
   - Enter your username and password to log in.

3. **Book an Appointment:**
   - Once logged in, navigate to the "Book Appointment" section.
   - Select the desired date, time, and service.
   - Submit the form to book the appointment.

4. **Admin Access:**
   - Admin can log in using admin credentials.
   - Admin can view all appointments, manage users, and update shop information from the admin dashboard.

## Contributing

We welcome contributions to improve MyBarber. Please follow these steps to contribute:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature-name`).
3. Make your changes.
4. Commit your changes (`git commit -m 'Add some feature'`).
5. Push to the branch (`git push origin feature/your-feature-name`).
6. Open a pull request.

## License

This project is licensed under the MIT License.

## Contact

For any questions or suggestions, please contact:

- Email: chitranshjain2025@gmail.com
- GitHub: [Chitransh1234](https://github.com/Chitransh1234)

---

This README file provides a comprehensive overview of the MyBarber project, including installation instructions, usage guidelines, and contribution details. Adjust the placeholders with your actual information before using it.

# 🎓 Student Management System (Native PHP OOP)

A professional, lightweight Student Management System built with **Native PHP** using **Object-Oriented Programming (OOP)** principles and **PDO** for secure database interactions.

---

## 🚀 Features
- **Full CRUD Operations**: Create, Read, Update, and Delete students.
- **Search Functionality**: Search for students by name or email.
- **Modern UI**: Clean and responsive dashboard built with **Bootstrap 5**.
- **Security**: Prepared statements to prevent SQL Injection.
- **Clean Architecture**: Separation of concerns between Logic (Classes) and Presentation (Views).
- **Icons**: Enhanced visual experience using **FontAwesome**.

---

## 🛠️ Tech Stack
- **Backend**: PHP 8.x (OOP)
- **Database**: MySQL (PDO)
- **Frontend**: Bootstrap 5, FontAwesome
- **Development Environment**: Laravel Herd

---

## 📦 Installation & Setup

To get this project running on your local machine, follow these steps:

### 1. Clone the repository
```bash
git clone [https://github.com/Aln3san/student-management-native-php.git](https://github.com/Aln3san/student-management-native-php.git)


2. Database Setup
    1. Open phpMyAdmin.
    2. Create a new database named student_db.
    3. Import the database.sql file provided in the root directory.

3. Configuration
    1. Go to the Class/ folder.
    2. Rename Database.php.example to Database.php.
    3. Open Database.php and update your credentials:
        private $host = "localhost";
        private $db_name = "student_db";
        private $username = "root";
        private $password = "YOUR_PASSWORD";

📂 Project Structure
Plaintext
├── Class/
│   ├── Database.php.example  # Configuration template
│   ├── Student.php           # Student Logic & SQL Queries
├── includes/
│   ├── header.php            # Navbar and CSS links
│   ├── footer.php            # Scripts and closing tags
├── views/
│   ├── index_view.php        # Main table view
│   ├── create_view.php       # Add student form
│   ├── edit_view.php         # Update student form
├── index.php                 # Main Controller
├── create.php                # Create Controller
├── edit.php                  # Update Controller
├── delete.php                # Delete Action
└── database.sql              # Database schema


🤝 Contributing
Contributions are welcome! Feel free to open a Pull Request or report issues.

👤 Author
Anas Alnaasan
• LinkedIn -> https://www.linkedin.com/in/anasaln3san
• GitHub -> https://github.com/Aln3san

Developed with ❤️ as part of my Backend Development journey.
# 🎓 Online Result Checking System

A simple and efficient web-based Result Management System that allows students to securely view their examination results using their Roll Number and Date of Birth.  
This project is developed as part of a DBMS laboratory assignment using PHP and MySQL.

---

## 🌟 Features

### Student Features
✅ Secure student login using Roll Number & DOB  
✅ Personalized student dashboard  
✅ View detailed examination results  
✅ Display percentile, AIR, category rank & qualification status  
✅ Clean and professional result page layout  
✅ Access exam syllabus and instructions  
✅ Support information available on dashboard  

---

### Database & System Features
✅ Normalized database design (2 tables + 1 view)  
✅ Real-time data retrieval using SQL VIEW  
✅ One-to-one relationship between student and result data  
✅ Easy to extend for admin panel and result upload  
✅ Consistent and reliable data structure  

---

## 🛠️ Tech Stack

**Frontend**
- HTML5  
- CSS3  
- Basic JavaScript  

**Backend**
- PHP  

**Database**
- MySQL  
- phpMyAdmin  

**Server**
- XAMPP (Apache + MySQL)

---

## 📋 Installation & Setup

### Prerequisites
- XAMPP installed  
- Web browser (Chrome / Edge / Firefox)  
- Basic knowledge of PHP & MySQL  

---

### Step-by-Step Setup

1. **Install XAMPP**
   - Download from: https://www.apachefriends.org/
   - Install and open XAMPP Control Panel

2. **Start Services**
   - Start **Apache**
   - Start **MySQL**

3. **Project Setup**
   - Copy the project folder into:
     ```
     C:\xampp\htdocs\result_project\
     ```

4. **Database Setup**
   - Open: `http://localhost/phpmyadmin`
   - Create a database (e.g., `result_db`)
   - Run the provided SQL scripts to create:
     - `student_basic`
     - `student_result`
     - `students` (VIEW)

5. **Run the Website**
   - Open browser and go to:
     ```
     http://localhost/result_project/
     ```

---

## 🚀 Usage

- Students log in using their **Roll Number** and **Date of Birth**
- Dashboard displays student overview
- Result page shows detailed performance data
- All data is fetched dynamically from the database
- No manual refresh or static data required

---

## 🗂️ Database Structure

### Tables
- `student_basic` → student identity and login details  
- `student_result` → examination performance data  

### View
- `students` → combines both tables for easy data access  

---

## 📁 Project Structure

result_project/
├── index.html
├── login.php
├── dashboard.php
├── view_result.php
├── result_page.php
├── instructions.html
├── syllabus.html
├── db_connect.php
├── style.css
├── README.md


---

## 🔐 Security Considerations
- Session-based authentication
- Controlled database access
- Structured queries for safe data retrieval

---

## 🎯 Future Enhancements
- Admin panel for uploading results
- Subject-wise marks display
- PDF scorecard download
- Merit list & cutoff pages
- Improved UI responsiveness

---

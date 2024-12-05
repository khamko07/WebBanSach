# WebBanSach

## Introduction
WebBanSach is an online bookstore platform that allows users to browse, search, and purchase books. The platform includes features for user registration, product management, order management, and revenue statistics.

## Features
- User registration and login
- Product listing, editing, and deletion
- Shopping cart management
- Order placement and management
- Revenue statistics by month, quarter, and year
- Search functionality for products
- Responsive design

## Technologies Used
- PHP
- MySQL
- HTML
- CSS
- JavaScript
- Bootstrap
- Font Awesome

## Installation
1. Clone the repository:
    ```sh
    git clone https://github.com/yourusername/WebBanSach.git
    ```
2. Navigate to the project directory:
    ```sh
    cd WebBanSach
    ```
3. Import the database:
    - Open phpMyAdmin and create a new database named `webbansach_khamko`.
    - Import the `webbansach_khamko.sql` file located in the project root.

4. Configure the database connection:
    - Open `connect_db.php` and update the database credentials if necessary.

5. Start the server:
    - Place the project in the `htdocs` directory of your XAMPP installation.
    - Start Apache and MySQL from the XAMPP control panel.

## Usage
1. Open your web browser and navigate to `http://localhost/WebBanSach`.
2. Register a new user account or log in with an existing account.
3. Browse and search for books.
4. Add books to your cart and proceed to checkout.
5. Manage products and orders from the admin panel.

## Configuration
- Database configuration can be found in `connect_db.php`.
- Update the timezone settings in relevant PHP files if necessary.

## Examples
- To add a new product, navigate to the admin panel and click on "Thêm sản phẩm".
- To view order details, navigate to the admin panel and click on "Đơn hàng".

## Contributing
1. Fork the repository.
2. Create a new branch:
    ```sh
    git checkout -b feature/your-feature-name
    ```
3. Make your changes and commit them:
    ```sh
    git commit -m 'Add some feature'
    ```
4. Push to the branch:
    ```sh
    git push origin feature/your-feature-name
    ```
5. Open a pull request.

## License
This project is licensed under the MIT License.

## Contact
For any inquiries, please contact us at khamko@pascaliaasia.com

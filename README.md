## JobHive - Job Search Platform

JobHive is a job search platform that allows users to discover and explore various job listings available from different companies. With a clean and intuitive interface, users can easily search, filter, and apply for job listings that match their skills and interests.

### Key Features

-   Display Job Listings from Multiple Companies
-   Filter Job Listings by Location, Industry, and Keywords
-   Job Details with Company Information, Location, Salary, and Other Requirements
-   Direct Application for Selected Job Listings
-   And many more exciting features!

### Installation Guide

To run JobHive on your local environment, follow these installation steps:

1. **System Requirements:**

    - PHP >= 7.4
    - Composer
    - MySQL or other Databases
    - Node.js & npm (optional, depending on project requirements)

2. **Clone the Repository:**

    ```bash
    git clone https://github.com/notsuperganang/jobhive.git
    ```

3. **Navigate to the Project Directory:**

    ```bash
    cd jobhive
    ```

4. **Install PHP Dependencies using Composer:**

    ```bash
    composer install
    ```

5. **Create a Copy of the .env File:**

    ```bash
    cp .env.example .env
    ```

6. **Configure Environment Settings:**

    - Create an empty Database in MySQL.
    - Configure the database connection in the `.env` file.

7. **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

8. **Run Database Migrations:**

    ```bash
    php artisan migrate
    ```

9. **Seed the Database (Optional):**
   If you want to populate the database with sample data, run the following command:

    ```bash
    php artisan db:seed
    ```

10. **Create a Symbolic Link for Storage:**

    ```bash
    php artisan storage:link
    ```

11. **Run the Local Server:**

    ```bash
    php artisan serve
    ```

12. **Run npm Process for Frontend (Optional):**
    If you require frontend asset compilation, you can run the following command:

    ```bash
    npm install && npm run dev
    ```

13. **Open the Application in a Browser:**
    Access the JobHive application at [http://localhost:8000](http://localhost:8000) in your browser.

### Contribution

We are highly open to contributions from the community. If you find a bug, have suggestions, or want to contribute code, please open a pull request to our repository on GitHub.

### License

JobHive is licensed under the [MIT License](LICENSE).

---

© 2024 JobHive. Developed with 💼 by the JobHive Team.

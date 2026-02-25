# Introduction
The idea here is to create a study plan entirely focused on practice, with the goal of helping you evolve as a PHP developer through the construction of a real project.

**But be aware:** the focus is not simply on solving a challenge. The proposal is that you use the challenge as a basis to apply each concept learned, step by step. With each new skill, the project should be improved, refactored, or expanded, becoming increasingly structured.

Therefore, don't start by implementing the challenge directly. First, study each topic proposed in the study plan, absorbing the concepts well and seeking to apply them practically in the system. The evolution of the project will be a natural consequence of your learning.

## The Challenge
A debt collection company is capturing potential clients (leads) in various ways: ads on Google, Facebook, Instagram, sales representatives, billboards, radio, and even TV.

**This has created a problem:** leads come from various sources, and currently there is no system to import and manage this data. Furthermore, in some cases it is necessary to export this data—for example, representatives may collect emails, import them into the system using, for example, a JSON, and then need to export this data in a format that Google Ads accepts, such as CSV.

**Based on this, develop a system that:**

- Reads data from various sources and saves it to the local database.

Examples of sources: CSV, XML, JSON, MySQL database, PostgreSQL database.

- Regardless of the data origin, allow exporting the information in the following formats: CSV, XML, JSON, XLSX, PDF, and Email.

The system should be built using MVC and should evolve over time as the concepts of the study plan are learned and applied.

You can use Composer and libraries for more specific functionalities (e.g., reading XLSX files with PhpSpreadsheet).

However, for sources like CSV, XML, JSON, MySQL, and PostgreSQL, use pure PHP. For the frontend, you can use jQuery.

You should create your own example files (CSV, XML, etc.) and work on them.

I recommend using ChatGPT to explain new knowledge; it will explain well anything that might not be clear.

Use Docker + nginx or Apache.

Recommendation: Use Ubuntu instead of Windows for development.

## Study Plan
### Step 1: Environment and Tools
Objective: To have the development environment fully ready to work with quality and productivity.

- Install and configure PhpStorm
- Learn the basics of using PhpStorm: navigation, execution, shortcuts, and inspection tools.

- Install and configure Xdebug
- Learn how to debug with PhpStorm + Xdebug
- Learn about PSR-1, PSR-2, PSR-12, and how PhpStorm applies them automatically.

### Step 2: Initial Structure and PSR-4
Objective: To assemble the project's foundation with correct automatic loading and a basic MVC structure.

- What is PSR-4 and how does it work?
- Composer and PSR-4: how to configure autoloading
- Creating a folder structure with namespaces
- Running composer dump-autoload and testing class loading
- Organizing folders according to responsibility
- How to redirect all requests to index.php within the public folder, and

keep the public folder isolated from the application code

### Step 3: OOP Fundamentals and SOLID Principles
Objective: Apply object-oriented programming and SOLID principles with good practices from the beginning.

- Review OOP (encapsulation, inheritance, polymorphism, association, etc.)
- Learn about interfaces, traits, and abstract classes.

- Study SOLID and how it works.

- From here, you can start implementing the project based on the knowledge acquired.

- Think about a structure that uses interfaces and abstract classes to create classes responsible for reading and writing data according to the challenge, and according to the SOLID principles.

- Apply SRP to the created classes.
- Apply OCP to facilitate the addition of new read and write classes. Ex: creating AbstractReader, AbstractWriter.
- Apply LSP ensuring that all implementations work interchangeably, using interfaces.
- Apply ISP separating responsibilities if necessary.
- Apply DIP to avoid concrete dependencies in the main classes.

### Step 4: Dependency Injection and Containers
Objective: Separate instantiation of dependencies from the controller, model, and view classes.

- Study what dependency injection and containers are.

- Create a simple container (you can use PHP-DI or create a basic container manually)
- Refactor controllers and models to receive dependencies via injection
- Avoid instantiating objects directly anywhere in the system: instead, use the container
- Learn about factories and generic factories
### Step 5: Organization and Best Practices
Objective: Adopt practices that make the code clean, readable, and maintainable.

- Avoid nesting ifs and other structures

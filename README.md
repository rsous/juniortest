<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Thanks again! Now go create something AMAZING! :D
***
***
***
*** To avoid retyping too much info. Do a search and replace for the following:
*** github_username, repo_name, twitter_handle, email, project_title, project_description
-->

<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->

[![LinkedIn][linkedin-shield]][linkedin-url]

<!-- PROJECT LOGO -->
<br />
<p align="center">

  <h3 align="center">Junior Developer test</h3>

  <p align="center">
    Junior developer assignment
    <br />
    <a href="https://github.com/rsous/juniortest"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://juniortest-rodolfo.herokuapp.com/">View Demo</a>
    ·
    <a href="https://github.com/rsous/juniortest/issues">Report Bug</a>
    ·
    <a href="https://github.com/rsous/juniortest/issues">Request Feature</a>
  </p>
</p>

<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary><h2 style="display: inline-block">Table of Contents</h2></summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#description-and-instructions">Description and instructions</a></li>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contact">Contact</a></li>
    <!-- <li><a href="#acknowledgements">Acknowledgements</a></li> -->
  </ol>
</details>

<!-- ABOUT THE PROJECT -->

## About The Project

This was a test assignment I had to complete when applying for a position as a junior developer.
It consists in building a web application where the user can add/register and delete products as well as see the entire inventory.

## Description and instructions

These are the instructions that were given to me so that I knew what I had to build.

The expected outcome of the test is a web-app (accessible by an URL) containing two pages for:

1. Product list page
2. Adding a product page

## General coding requirements

These are the listed mandatory technical requirements:

1. Utilize OOP principles to handle differences in type logic/behavior
   Procedural PHP code is allowed exclusively to initialize your PHP classes. Rest logic should be placed within class methods.

2. Avoid using conditional statements for handling differences in product types

3. Do not use different endpoints for different products types. There should be 1 general endpoint for product saving

4. PHP: ^7.0, plain classes, no frameworks, OOP approach

5. MySQL: ^5.6 obligatory

### 1. Product List

MUST HAVE for the list items:

- SKU (unique for each product)
- Name
- Price in $
- One of the product-specific attributes and its value
  - Size (in MB) for DVD-disc
  - Weight (in Kg) for Book
  - Dimensions (HxWxL) for Furniture

### Required UI elements:

- “ADD” button, which would lead to the “Product Add” page
- “MASS DELETE” action, implemented as checkboxes next to each product (should have a class: .delete-checkbox) and a button “MASS DELETE” triggering delete action for the selected products.
- There should be no pagination for the listing, all items should be on the same page
- Do not show any notification messages or alert windows loading the list or after submitting ADD new product dialogue

### 2. Adding a product page

The page should display a form with id: #product_form, with the following fields:

- SKU (id: #sku)
- Name (id: #name)
- Price (id: #price)

- Product type switcher (id: #productType) with following options:

  - DVD (can be value or text)
  - Book (can be value or text)
  - Furniture (can be value or text)

- Product type-specific attribute
  - Size input field (in MB) for DVD-disc should have an ID: #size
  - Weight input field (in Kg) for Book should have an ID: #weight
  - Each from Dimensions input fields (HxWxL) for Furniture should have an appropriate ID:
    - Height - #height
    - Width - #width
    - Length - #length

### **Add product page requirements:**

- The form should be dynamically changed when the type is switched
- Special attributes should have a description, related to their type, e.g.: “Please, provide dimensions” / “Please, provide weight” / “Please, provide size” when related product type is selected
- All fields are mandatory for submission, missing values should trigger notification “Please, submit required data”
- Implement input field value validation, invalid data must trigger notification “Please, provide the data of indicated type”
- Notification messages should appear on the same page without reloading
- The page must have a “Save” button to save the product. Once saved, return to the “Product List” page with the new product added.
- The page must have a “Cancel” button to cancel adding the product action. Once canceled, returned to the “Product List” page with no new products added.
- No additional dialogues like “Are you sure you want to Save / Cancel?”
- SKU should be unique for each product and it shouldn’t be possible to save products if already any product with the same SKU exists.

### Built With

- [HTML]()
- [CSS]()
- [SASS]()
- [Javascript]()
- [PHP]()
- [SQL]()

<!-- GETTING STARTED -->

## Getting Started

To get a local copy up and running follow these simple steps.

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/rsous/juniortest.git
   ```

<!-- USAGE EXAMPLES -->

## Usage

To have access to the development environment:

1. Use an IDE of your preference
2. Install dependencies and packages with

```sh
 npm install
```

3. Create a database and populate it with the tables and columns following this structure:

- products

  1. id (PRI, int, AI)
  2. title (varchar)
  3. sku (varchar)
  4. price (float)
  5. custom_attr (varchar)
  6. type_id (int)
  7. created_at (datetime, current_time)

- product_types

  1. id (PRI, int, AI)
  2. name (varchar)
  3. custom_attr (varchar)
  4. unit (varchar)
  5. prefix (varchar)
  6. created_at (datetime, current_time)

  The product_types table should be populated with the desired information. The client will not interact with this table and it is used to format and show the products table data correctly.

  name: corresponds to the product category (DVD, Book, Furniture)
  custom_attr: corresponds to the custom attribute (Size, Weight, Height Width Length)
  unit: corresponds to the measurement unit (MB, KG, )
  prefix: corresponds to the prefix to be added in the custom attribute field (Size, Weight, Dimension)

4. Set the credentials for your database in the Dbh class (classes\Dbh.php)

5. Go to your localhost or your online site. It should be working.

<!-- ROADMAP -->

## Roadmap

See the [open issues](https://github.com/rsous/juniortest/issues) for a list of proposed features (and known issues).

<!-- CONTACT -->

## Contact

Rodolfo - [@rsovs](https://twitter.com/rsovs) - rsovs@proton.me

Project Link: [https://github.com/rsous/juniortest](https://github.com/rsous/juniortest)

<!-- ACKNOWLEDGEMENTS -->

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[contributors-shield]: https://img.shields.io/github/contributors/rsous/repo.svg?style=for-the-badge
[contributors-url]: https://github.com/rsous/repo/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/rsous/repo.svg?style=for-the-badge
[forks-url]: https://github.com/rsous/repo/network/members
[stars-shield]: https://img.shields.io/github/stars/rsous/repo.svg?style=for-the-badge
[stars-url]: https://github.com/rsous/repo/stargazers
[issues-shield]: https://img.shields.io/github/issues/rsous/repo.svg?style=for-the-badge
[issues-url]: https://github.com/rsous/repo/issues
[license-shield]: https://img.shields.io/github/license/rsous/repo.svg?style=for-the-badge
[license-url]: https://github.com/rsous/repo/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/rsous

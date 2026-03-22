# Toposel - WordPress Developer Assignment

A custom, mobile-first WordPress theme built as part of the Web Developer assessment for **Toposel**. 

## 🚀 Objective
The goal of this project was to replicate a high-fidelity mobile homepage design using WordPress, ensuring all content (text, images, logos, and products) is **fully dynamic** and editable for a non-technical user.

---

## 🛠️ Key Features
- **Mobile-First Design:** Precise replication of the "Shop.co" mobile layout from the Figma design.
- **Dynamic Content (ACF):** Used **Advanced Custom Fields (ACF)** to make the Announcement Bar, Hero Banner, and Brand Logos editable via the CMS.
- **WooCommerce Integration:** Powered the "New Arrivals" section using a custom `WP_Query` to fetch dynamic product data.
- **Smart Fallback System:** Built-in safeguards that show beautiful SVG icons and text labels if the user hasn't uploaded images or added products yet.
- **Optimized Assets:** Implemented cache-busting `time()` timestamps for the stylesheet to ensure a smooth development and testing experience.

---

## 📂 Project Structure
- `functions.php`: Handles theme setup, asset enqueuing, and **programmatic ACF field registration** (ensures portability).
- `front-page.php`: The main template logic for the homepage.
- `css/home.css`: Modern, premium styling using Google Fonts (Anton & Inter).
- `header.php` / `footer.php`: Clean, semantic HTML5 structure.

---

## 🏗️ How to Set Up & Test
1. **Clone/Download:** Place the `toposel-theme` folder into your `/wp-content/themes/` directory.
2. **Activate:** Activate **"Toposel Theme"** from the WordPress admin.
3. **Required Plugins:** Ensure **Advanced Custom Fields (ACF)** and **WooCommerce** are active.
4. **Homepage Setup:** 
   - Create a page called **"Home"**.
   - Assign it the **"Homepage"** template.
   - Set it as your static front page in **Settings > Reading**.
5. **Add Content:** Edit the "Home" page to add your Hero image, Brand logos, and Announcement text.

---

## 🎬 Submission Details
- **Video Walkthrough:** (Paste your video link here)
- **GitHub Repository:** [https://github.com/hunneymandhotra/toposel-assessment](https://github.com/hunneymandhotra/toposel-assessment)

Developed with ❤️ by **Hunney Mandhotra**

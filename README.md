# Move to Azerbaijan – Static Site

A single-page marketing site built with **Next.js** and **Tailwind CSS** to showcase the *Move to Azerbaijan* investment & relocation program.

## ✨ Features

• Responsive, utility-first design with desert-sand accent `#C9A66B`  
• Sticky smooth-scroll navigation  
• WhatsApp click-to-chat button  
• RTL font & layout support (auto-detects Arabic, Hebrew, Farsi, Urdu locales)  
• No images – clean typography, semantic HTML, accessible markup

## 🚀 Getting Started

1. **Clone and install dependencies**

   ```bash
   git clone <repo-url> && cd movetoaz
   npm install
   ```

2. **Run the dev server**

   ```bash
   npm run dev
   ```

   Open http://localhost:3000 in your browser to see the page.

3. **Build for production**

   ```bash
   npm run build
   npm start
   ```

## 🗂️ Project Structure

```
├── pages
│   ├── _app.tsx    # Tailwind & global styles
│   └── index.tsx  # Single marketing page
├── styles
│   └── globals.css
├── tailwind.config.js
├── postcss.config.js
└── README.md
```

## 📝 License

MIT 
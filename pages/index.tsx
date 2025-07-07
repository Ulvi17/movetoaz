import React from "react";
import { useEffect } from "react";
import Head from "next/head";

const navItems = [
  { id: "hero", label: "Home" },
  { id: "why", label: "Why Azerbaijan" },
  { id: "packages", label: "Packages" },
  { id: "process", label: "How It Works" },
  { id: "faq", label: "FAQ" },
  { id: "contact", label: "Contact" },
];

export default function Home() {
  // Auto-set dir="rtl" if the user's browser language is an RTL locale
  useEffect(() => {
    if (typeof window !== "undefined") {
      const rtlLangs = ["ar", "he", "fa", "ur"];
      const userLang = navigator.language.slice(0, 2).toLowerCase();
      if (rtlLangs.includes(userLang)) {
        document.documentElement.setAttribute("dir", "rtl");
      }
    }
  }, []);

  return (
    <>
      <Head>
        <title>Move to Azerbaijan – Residency & Investment for MENA Investors</title>
        <meta
          name="description"
          content="Secure your family's future with residency-by-investment in Azerbaijan. Fully managed legal, migration and property services for Gulf investors."
        />
      </Head>
      {/* Sticky Navigation */}
      <header className="sticky top-0 z-40 bg-white/80 backdrop-blur border-b border-gray-200">
        <nav className="max-w-6xl mx-auto flex items-center justify-between px-4 py-3">
          <span className="font-bold text-desert-sand">Move&nbsp;to&nbsp;AZ</span>
          <ul className="flex space-x-4 rtl:space-x-reverse">
            {navItems.map((item) => (
              <li key={item.id}>
                <a
                  href={`#${item.id}`}
                  className="text-sm font-medium text-gray-700 hover:text-desert-sand"
                >
                  {item.label}
                </a>
              </li>
            ))}
          </ul>
        </nav>
      </header>

      <main className="font-sans text-gray-800">
        {/* Hero */}
        <section id="hero" className="min-h-screen flex items-center justify-center bg-gray-50 px-6 text-center">
          <div className="max-w-3xl space-y-6">
            <h1 className="text-3xl sm:text-5xl font-bold leading-tight">
              Move to Azerbaijan
            </h1>
            <h2 className="text-xl sm:text-2xl text-desert-sand font-semibold">
              Secure Your Family's Future &amp; Earn Solid Returns in the Caucasus
            </h2>
            <p className="text-base sm:text-lg">
              A fully managed path to residency and real-estate ownership for Gulf and wider-MENA investors.
            </p>
            <div>
              <a
                href="#contact"
                className="inline-block rounded bg-desert-sand px-6 py-3 text-white font-medium hover:opacity-90"
              >
                Book Consultation
              </a>
            </div>
          </div>
        </section>

        {/* Why Azerbaijan */}
        <section id="why" className="py-16 px-6 bg-white">
          <div className="max-w-4xl mx-auto">
            <h2 className="text-2xl font-bold mb-6">Why Azerbaijan</h2>
            <ul className="list-disc space-y-3 pl-5">
              <li>Strategic gateway between Europe &amp; Asia with direct Gulf flights.</li>
              <li>Competitive property prices; Baku apartments can yield 8–10&nbsp;% gross rent.</li>
              <li>Residency by investment from ≈ USD&nbsp;100&nbsp;k property or USD&nbsp;60&nbsp;k bank deposit.</li>
              <li>Transparent title registration and guaranteed property rights.</li>
              <li>Politically stable, family-friendly environment.</li>
            </ul>
          </div>
        </section>

        {/* Investment Packages */}
        <section id="packages" className="py-16 px-6 bg-gray-50">
          <div className="max-w-6xl mx-auto">
            <h2 className="text-2xl font-bold mb-6">Investment Packages</h2>
            <div className="overflow-x-auto">
              <table className="min-w-full text-left border-collapse">
                <thead className="bg-desert-sand text-white">
                  <tr>
                    <th className="p-3">Package</th>
                    <th className="p-3">Min Capital</th>
                    <th className="p-3">What's Included</th>
                    <th className="p-3">Service Fee</th>
                  </tr>
                </thead>
                <tbody>
                  <tr className="even:bg-white odd:bg-gray-100">
                    <td className="p-3">Bank Deposit</td>
                    <td className="p-3">USD 60&nbsp;000 term deposit</td>
                    <td className="p-3">Bank compliance &amp; TRP filing</td>
                    <td className="p-3">Up to USD 2&nbsp;500</td>
                  </tr>
                  <tr className="even:bg-white odd:bg-gray-100">
                    <td className="p-3">Commercial Property</td>
                    <td className="p-3">Property purchase</td>
                    <td className="p-3">Company formation, accounting, TRP, property mgmt</td>
                    <td className="p-3">USD 6&nbsp;000 + 2&nbsp;% of asset price</td>
                  </tr>
                  <tr className="even:bg-white odd:bg-gray-100">
                    <td className="p-3">Villas</td>
                    <td className="p-3">Property purchase</td>
                    <td className="p-3">Search, company set-up, TRP, property mgmt</td>
                    <td className="p-3">USD 5&nbsp;000 + 2&nbsp;% of asset price</td>
                  </tr>
                  <tr className="even:bg-white odd:bg-gray-100">
                    <td className="p-3">Apartments</td>
                    <td className="p-3">Property purchase</td>
                    <td className="p-3">Search, TRP, property mgmt</td>
                    <td className="p-3">USD 4&nbsp;000 + 2&nbsp;% of asset price</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div className="mt-8 text-center">
              <a
                href="https://wa.me/994707157787"
                target="_blank"
                rel="noopener noreferrer"
                className="inline-block rounded bg-desert-sand px-6 py-3 text-white font-medium hover:opacity-90"
              >
                Book Consultation
              </a>
            </div>
          </div>
        </section>

        {/* How It Works */}
        <section id="process" className="py-16 px-6 bg-white">
          <div className="max-w-4xl mx-auto">
            <h2 className="text-2xl font-bold mb-6">How It Works</h2>
            <ol className="list-decimal space-y-3 pl-5">
              <li>Online inquiry &amp; 15&nbsp;% service pre-payment.</li>
              <li>Property (or deposit) search starts within 48&nbsp;h.</li>
              <li>Client reserves chosen asset (≈ 2&nbsp;% of price).</li>
              <li>60&nbsp;% service-fee instalment.</li>
              <li>Legal &amp; migration processing via State Migration Service.</li>
              <li>Final asset payment and title transfer.</li>
              <li>TRP card issued in 20–30 business days.</li>
              <li>Final 25&nbsp;% service-fee balance.</li>
              <li>Optional property-management agreement.</li>
              <li>Annual renewal reminders; real-estate tax ≈ 0.1–0.2&nbsp;% of cadastral value.</li>
            </ol>
          </div>
        </section>

        {/* FAQ */}
        <section id="faq" className="py-16 px-6 bg-gray-50">
          <div className="max-w-4xl mx-auto">
            <h2 className="text-2xl font-bold mb-6">FAQ</h2>
            <div className="space-y-4">
              <details className="border rounded">
                <summary className="cursor-pointer p-3 font-medium">
                  Does a TRP let me apply for Schengen visas from Baku?
                </summary>
                <p className="p-3 border-t">Yes, embassies accept TRP holders.</p>
              </details>
              <details className="border rounded">
                <summary className="cursor-pointer p-3 font-medium">
                  Minimum property value for TRP?
                </summary>
                <p className="p-3 border-t">About AZN 50&nbsp;000 (≈ USD 30&nbsp;k).</p>
              </details>
              <details className="border rounded">
                <summary className="cursor-pointer p-3 font-medium">
                  Time allowed outside Azerbaijan?
                </summary>
                <p className="p-3 border-t">Up to 90 days per year.</p>
              </details>
              <details className="border rounded">
                <summary className="cursor-pointer p-3 font-medium">
                  Can my family join?
                </summary>
                <p className="p-3 border-t">Spouse and children may apply as dependants.</p>
              </details>
              <details className="border rounded">
                <summary className="cursor-pointer p-3 font-medium">
                  Document language?
                </summary>
                <p className="p-3 border-t">Azerbaijani; certified translations required.</p>
              </details>
              <details className="border rounded">
                <summary className="cursor-pointer p-3 font-medium">
                  Annual real-estate tax for foreigners?
                </summary>
                <p className="p-3 border-t">0.1–0.2&nbsp;% of cadastral value.</p>
              </details>
            </div>
          </div>
        </section>

        {/* Contact */}
        <section id="contact" className="py-16 px-6 bg-white">
          <div className="max-w-4xl mx-auto space-y-4">
            <h2 className="text-2xl font-bold mb-6">Contact</h2>
            <address className="not-italic space-y-2">
              <p>Expert SM LLC</p>
              <p>Balababa Majidov St 22, 11th Floor, Baku AZ&nbsp;1009</p>
              <p>Phone: <a href="tel:+994124935556" className="text-desert-sand hover:underline">+994&nbsp;12&nbsp;493&nbsp;55&nbsp;56</a></p>
              <p>WhatsApp: <a href="https://wa.me/994707157787" className="text-desert-sand hover:underline" target="_blank" rel="noopener noreferrer">+994&nbsp;70&nbsp;715&nbsp;77&nbsp;87</a></p>
              <p>E-mail: <a href="mailto:info@moveto.az" className="text-desert-sand hover:underline">info@moveto.az</a></p>
            </address>
          </div>
        </section>
      </main>

      {/* WhatsApp Floating Button */}
      <a
        href="https://wa.me/994707157787"
        className="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Chat on WhatsApp"
      >
        {/* Simple WhatsApp SVG icon */}
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          className="w-7 h-7"
        >
          <path d="M12 .5C5.73.5.5 5.73.5 12c0 2.11.55 4.02 1.52 5.71L.5 23.5l5.91-1.47A11.45 11.45 0 0 0 12 23.5C18.27 23.5 23.5 18.27 23.5 12S18.27.5 12 .5Zm0 20.4c-1.94 0-3.73-.58-5.23-1.57l-.37-.24-3.5.87.93-3.41-.24-.39A9.42 9.42 0 0 1 2.6 12C2.6 6.97 6.97 2.6 12 2.6S21.4 6.97 21.4 12 17.03 20.9 12 20.9Zm5.47-6.86c-.3-.15-1.77-.87-2.04-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.47-.89-.79-1.49-1.77-1.66-2.07-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.59-.48-.5-.67-.5h-.57c-.2 0-.52.07-.79.37s-1.04 1.02-1.04 2.48 1.07 2.87 1.22 3.07c.15.2 2.1 3.2 5.08 4.48 3.54 1.44 3.54.96 4.17.9.64-.06 2.04-.82 2.33-1.61.29-.79.29-1.47.2-1.61-.1-.15-.29-.22-.59-.37Z" />
        </svg>
      </a>
    </>
  );
} 
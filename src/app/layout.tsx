import type { Metadata } from "next";
import { Inter, Instrument_Sans } from "next/font/google";
import "./globals.css";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";

const inter = Inter({
  variable: "--font-inter",
  subsets: ["latin"],
});

const instrumentSans = Instrument_Sans({
  variable: "--font-instrument-sans",
  subsets: ["latin"],
});

export const metadata: Metadata = {
  title: "Pramajaya - Website Developer",
  description: "Portfolio of Pramajaya, Website Developer specialising in Laravel, Next.js, and modern web design.",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html
      lang="en"
      className={`${inter.variable} ${instrumentSans.variable} h-full antialiased`}
    >
      <body className="min-h-full flex flex-col bg-black text-white overflow-x-hidden">
        {/* Background vertical grid lines */}
        <div className="content-lines" aria-hidden="true" />
        {/* Noise texture */}
        <div className="noise" aria-hidden="true" />
        {/* Scanlines */}
        <div className="scanlines" aria-hidden="true" />

        <Navbar />
        <main className="flex-1 relative z-10">
          {children}
        </main>
        <Footer />
      </body>
    </html>
  );
}

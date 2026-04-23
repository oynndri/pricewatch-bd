-- ============================================================
-- PriceWatch BD - Database Schema & Seed Data
-- Run this in phpMyAdmin: select pricewatch_bd → SQL tab → paste → Go
-- ============================================================

CREATE DATABASE IF NOT EXISTS pricewatch_bd CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE pricewatch_bd;

-- ─── Tables ──────────────────────────────────────────────────

CREATE TABLE IF NOT EXISTS products (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(100) NOT NULL,
    nameEn      VARCHAR(100) NOT NULL,
    category    VARCHAR(50)  NOT NULL,
    unit        VARCHAR(20)  NOT NULL,
    icon        VARCHAR(10)  NOT NULL,
    description TEXT
);

CREATE TABLE IF NOT EXISTS markets (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(100) NOT NULL,
    nameEn      VARCHAR(100) NOT NULL,
    location    VARCHAR(100) NOT NULL,
    district    VARCHAR(100) NOT NULL,
    rating      DECIMAL(3,1) DEFAULT 0,
    verified    TINYINT(1)   DEFAULT 0,
    type        VARCHAR(20)  NOT NULL,
    totalPrices INT          DEFAULT 0,
    description TEXT
);

CREATE TABLE IF NOT EXISTS price_entries (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    productId   INT          NOT NULL,
    marketId    INT          NOT NULL,
    price       DECIMAL(10,2) NOT NULL,
    submittedBy VARCHAR(100) DEFAULT 'anonymous',
    date        DATE         NOT NULL,
    verified    TINYINT(1)   DEFAULT 0,
    FOREIGN KEY (productId) REFERENCES products(id),
    FOREIGN KEY (marketId)  REFERENCES markets(id)
);

CREATE TABLE IF NOT EXISTS users (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    name          VARCHAR(100) NOT NULL,
    email         VARCHAR(150) NOT NULL UNIQUE,
    password      VARCHAR(255) NOT NULL,
    role          VARCHAR(20)  DEFAULT 'user',
    contributions INT          DEFAULT 0,
    avatar        VARCHAR(10),
    joinDate      DATE
);

-- ─── Seed: Products ──────────────────────────────────────────

INSERT INTO products (id, name, nameEn, category, unit, icon, description) VALUES
(1,  'মিনিকেট চাল',     'Miniket Rice',    'rice',       'kg',     '🌾', 'Fine-grain premium rice, widely consumed across Bangladesh.'),
(2,  'নাজিরশাইল চাল',   'Nazirshail Rice', 'rice',       'kg',     '🌾', 'Aromatic long-grain rice popular for special occasions.'),
(3,  'মসুর ডাল',        'Red Lentil',      'lentils',    'kg',     '🫘', 'High-protein red lentils, a staple ingredient in Bangladeshi cooking.'),
(4,  'ছোলার ডাল',       'Chickpea Lentil', 'lentils',    'kg',     '🫘', 'Nutritious split chickpeas used in dals and snacks.'),
(5,  'ডিম',             'Eggs',            'eggs',       'dozen',  '🥚', 'Farm-fresh chicken eggs, essential protein source.'),
(6,  'পেঁয়াজ',          'Onion',           'vegetables', 'kg',     '🧅', 'Fresh onions, a key cooking ingredient in every Bangladeshi kitchen.'),
(7,  'আলু',             'Potato',          'vegetables', 'kg',     '🥔', 'Versatile potatoes used in curries, snacks, and side dishes.'),
(8,  'সয়াবিন তেল',     'Soybean Oil',     'oil',        'liter',  '🫙', 'Refined soybean cooking oil, the most widely used oil in Bangladesh.'),
(9,  'সরিষার তেল',      'Mustard Oil',     'oil',        'liter',  '🫙', 'Pungent mustard oil used for frying and pickles.'),
(10, 'টমেটো',           'Tomato',          'vegetables', 'kg',     '🍅', 'Fresh tomatoes for curries and salads.'),
(11, 'বেগুন',           'Brinjal',         'vegetables', 'kg',     '🍆', 'Eggplant used in stir-fries, fritters, and curries.'),
(12, 'চিনি',            'Sugar',           'others',     'kg',     '🍬', 'Refined white sugar for daily use in tea, sweets, and cooking.');

-- ─── Seed: Markets ───────────────────────────────────────────

INSERT INTO markets (id, name, nameEn, location, district, rating, verified, type, totalPrices, description) VALUES
(1,  'কারওয়ান বাজার',      'Karwan Bazar',    'Dhaka',      'Dhaka',      4.7, 1, 'wholesale', 1240, 'Largest wholesale market in Dhaka, open 24/7.'),
(2,  'শ্যামবাজার',          'Shyambazar',      'Dhaka',      'Dhaka',      4.5, 1, 'wholesale', 980,  'Famous vegetable and spice wholesale hub in Old Dhaka.'),
(3,  'মিরপুর বাজার',        'Mirpur Bazar',    'Dhaka',      'Dhaka',      4.2, 1, 'retail',    760,  'Popular retail market serving Mirpur residential areas.'),
(4,  'মোহাম্মদপুর বাজার',   'Mohammadpur Bazar','Dhaka',     'Dhaka',      4.3, 0, 'retail',    620,  'Busy neighborhood market in western Dhaka.'),
(5,  'রেয়াজউদ্দিন বাজার',   'Reazuddin Bazar', 'Chittagong', 'Chittagong', 4.6, 1, 'wholesale', 890,  'Premier wholesale market of Chittagong city.'),
(6,  'বটতলা বাজার',         'Bottola Bazar',   'Chittagong', 'Chittagong', 4.1, 0, 'retail',    430,  'Local retail market in Chittagong.'),
(7,  'সাহেব বাজার',         'Saheb Bazar',     'Rajshahi',   'Rajshahi',   4.4, 1, 'wholesale', 540,  'Main market hub of Rajshahi division.'),
(8,  'নতুন বাজার',          'Notun Bazar',     'Sylhet',     'Sylhet',     4.0, 0, 'retail',    310,  'Central produce market in Sylhet city.'),
(9,  'গোপালগঞ্জ বাজার',     'Gopalganj Bazar', 'Gopalganj',  'Gopalganj',  3.9, 0, 'retail',    220,  'Local market in Gopalganj district.'),
(10, 'খুলনা বড় বাজার',     'Khulna Baro Bazar','Khulna',    'Khulna',     4.5, 1, 'wholesale', 670,  'Main wholesale market of Khulna city.');

-- ─── Seed: Price Entries ─────────────────────────────────────

INSERT INTO price_entries (id, productId, marketId, price, submittedBy, date, verified) VALUES
-- Miniket Rice
(1,  1,  1, 68,  'admin', '2026-03-10', 1),
(2,  1,  2, 70,  'admin', '2026-03-10', 1),
(3,  1,  3, 74,  'admin', '2026-03-10', 1),
(4,  1,  5, 72,  'admin', '2026-03-10', 1),
(5,  1,  7, 69,  'admin', '2026-03-10', 1),
-- Eggs
(6,  5,  1, 145, 'admin', '2026-03-10', 1),
(7,  5,  2, 148, 'admin', '2026-03-10', 1),
(8,  5,  3, 150, 'admin', '2026-03-10', 1),
(9,  5,  5, 146, 'admin', '2026-03-10', 1),
-- Onion
(10, 6,  1, 55,  'admin', '2026-03-10', 1),
(11, 6,  2, 52,  'admin', '2026-03-10', 1),
(12, 6,  3, 60,  'admin', '2026-03-10', 1),
(13, 6,  5, 58,  'admin', '2026-03-10', 1),
-- Potato
(14, 7,  1, 38,  'admin', '2026-03-10', 1),
(15, 7,  2, 35,  'admin', '2026-03-10', 1),
(16, 7,  3, 42,  'admin', '2026-03-10', 1),
(17, 7,  5, 40,  'admin', '2026-03-10', 1),
-- Soybean Oil
(18, 8,  1, 168, 'admin', '2026-03-10', 1),
(19, 8,  2, 165, 'admin', '2026-03-10', 1),
(20, 8,  5, 170, 'admin', '2026-03-10', 1),
-- Red Lentil
(21, 3,  1, 128, 'admin', '2026-03-10', 1),
(22, 3,  2, 125, 'admin', '2026-03-10', 1),
(23, 3,  5, 130, 'admin', '2026-03-10', 1),
-- Sugar
(24, 12, 1, 132, 'admin', '2026-03-10', 1),
(25, 12, 2, 130, 'admin', '2026-03-10', 1);

-- ─── Seed: Admin User ────────────────────────────────────────

INSERT INTO users (id, name, email, password, role, contributions, avatar, joinDate) VALUES
(1, 'Admin User', 'admin@pricewatch.bd', 'admin123', 'admin', 24, 'A', '2025-01-01');

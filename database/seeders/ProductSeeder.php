<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Running Shoes',
            'price' => 49.99,
            'image' => 'shoes.jpg',
            'stock' => 15,
            'description' => 'Lightweight and breathable athletic running shoes engineered with advanced shock-absorbing foam soles, flexible multi-directional mesh fabric, and reinforced traction outsoles designed to minimize foot fatigue during intense marathons, gym sessions, and everyday training.',
            'about' => 'Engineered with shock-absorbing soles and flexible mesh fabric to reduce foot fatigue and enhance daily training performance.',
        ]);

        Product::create([
            'name' => 'Smart Watch',
            'price' => 199.99,
            'image' => 'watch.jpg',
            'stock' => 8,
            'description' => 'Sleek, modern fitness tracker and smartwatch featuring a vibrant high-definition touch display, IP68 water resistance, multi-sport tracking modes, continuous heart rate and blood oxygen monitoring, and instant smartphone notifications right on your wrist.',
            'about' => 'Stay connected and track your daily fitness goals, heart rate, sleep quality, and workouts right from your wrist with a vibrant display.',
        ]);

        Product::create([
            'name' => 'Wireless Headphones',
            'price' => 79.99,
            'image' => 'headphones.jpg',
            'stock' => 20,
            'description' => 'Immersive over-ear wireless headphones equipped with active noise cancellation technology, custom dynamic audio drivers for rich high-fidelity sound, plush memory foam ear cushions, and an extended 40-hour rechargeable battery life for all-day listening.',
            'about' => 'Designed for long listening sessions with plush memory foam ear cushions and an extended battery life that keeps you unplugged all day.',
        ]);

        Product::create([
            'name' => 'Laptop',
            'price' => 899.99,
            'image' => 'laptop.jpg',
            'stock' => 10,
            'description' => 'High-performance laptop built with a blazing-fast multi-core processor, high-speed solid-state storage, and a stunning anti-glare high-resolution display crafted for seamless multitasking, intensive coding, graphic design, and heavy entertainment workloads.',
            'about' => 'Equipped with a powerful processor, fast solid-state storage, and a stunning high-resolution display to handle heavy workloads with ease.',
        ]);

        Product::create([
            'name' => 'Backpack',
            'price' => 39.99,
            'image' => 'backpack.jpg',
            'stock' => 25,
            'description' => 'Durable, weather-resistant travel and commuter backpack featuring a dedicated padded laptop compartment, multiple secure zippered pockets, integrated external USB charging port, and breathable ergonomic shoulder straps for supreme carrying comfort.',
            'about' => 'Crafted from water-resistant materials with ergonomic padded straps for secure daily commutes, school, or weekend travel adventures.',
        ]);

        Product::create([
            'name' => 'Smartphone',
            'price' => 599.99,
            'image' => 'smartphone.jpg',
            'stock' => 12,
            'description' => 'Cutting-edge flagship smartphone featuring an advanced multi-lens night-vision camera system, fluid high-refresh-rate edge-to-edge touch screen, ultra-fast processor, and an intelligent battery management system designed to last all day on a single charge.',
            'about' => 'Capture crystal-clear photos and enjoy fluid navigation, fast app loading, and a vibrant edge-to-edge touch display.',
        ]);

        Product::create([
            'name' => 'Sunglasses',
            'price' => 24.99,
            'image' => 'sunglasses.jpg',
            'stock' => 30,
            'description' => 'Stylish, lightweight polarized sunglasses offering complete 100% UV400 protection against harmful sun rays, anti-glare crystal clear optics, and a durable, flexible frame designed for optimal comfort during outdoor activities and sunny beach days.',
            'about' => 'Combines a timeless frame design with glare-reducing lenses to keep your eyes safe and your outdoor look sharp.',
        ]);

        Product::create([
            'name' => 'Bluetooth Speaker',
            'price' => 59.99,
            'image' => 'speaker.jpg',
            'stock' => 18,
            'description' => 'Compact and portable wireless Bluetooth speaker delivering booming deep bass and crisp 360-degree room-filling sound, wrapped in a rugged, IPX7 water-resistant housing built for outdoor gatherings, poolside parties, and rugged adventures.',
            'about' => 'Features a rugged, water-resistant exterior making it the perfect companion for outdoor parties, beach trips, and home listening.',
        ]);

        Product::create([
            'name' => 'Mechanical Keyboard',
            'price' => 89.99,
            'image' => 'keyboard.jpg',
            'stock' => 14,
            'description' => 'Responsive mechanical gaming keyboard featuring tactile custom mechanical switches, vibrant per-key customizable RGB backlighting, full N-key rollover anti-ghosting technology, and a heavy-duty aluminum chassis designed for long-lasting durability.',
            'about' => 'Designed for precise typing and enhanced gaming performance, featuring durable keycaps and anti-ghosting technology.',
        ]);

        Product::create([
            'name' => 'Office Chair',
            'price' => 149.99,
            'image' => 'chair.jpg',
            'stock' => 7,
            'description' => 'Ergonomic high-back office and gaming chair featuring multi-directional adjustable height and armrests, built-in adaptive lumbar support, breathable mesh upholstery, and smooth-rolling 360-degree swivel caster wheels for maximum posture support.',
            'about' => 'Promotes a healthy posture and ensures all-day comfort during long working or gaming sessions at your desk.',
        ]);
    }
}
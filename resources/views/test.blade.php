<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Xbanging Video Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white font-sans">
<div class="max-w-7xl mx-auto p-4">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left 2/3 section: Video + Details -->
        <div class="lg:col-span-2 space-y-4">
            <div class="relative">
                <!-- Ambient BG -->
                <video class="absolute top-0 left-0 w-full h-full blur-3xl opacity-70 z-0 hidden" id="ambientBg" autoplay muted loop playsinline>
                    <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                </video>
                <!-- Main Video -->
                <video class="relative z-10 w-full" controls>
                    <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                </video>
            </div>

            <!-- Buttons -->
            <div class="flex flex-wrap gap-3">
                <button class="px-4 py-2 bg-gray-700 rounded-full">👍 Like</button>
                <button class="px-4 py-2 bg-gray-700 rounded-full">⭐ Favorite</button>
                <button class="px-4 py-2 bg-gray-700 rounded-full">🔗 Share</button>
                <button id="ambientToggle" class="px-4 py-2 bg-gray-700 rounded-full flex items-center gap-2">
                    <svg class="w-5 h-5 text-white" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" d="M4 4h2v2H4V4zm14 0h2v2h-2V4zM4 18h2v2H4v-2zm14 0h2v2h-2v-2zM11 7h2v10h-2V7zm-4 4h2v2H7v-2zm8 0h2v2h-2v-2z"/>
                    </svg>
                    Ambient
                </button>
                <button class="px-4 py-2 bg-gray-700 rounded-full">▶ Full Video</button>
            </div>

            <!-- Title + Tags -->
            <h2 class="text-2xl font-bold mt-6">Xbanging test video </h2>
            <p class="text-gray-400 text-sm">28 min • July 25, 2025</p>
            <div class="flex gap-2 mt-2">
                <span class="bg-gray-800 px-3 py-1 rounded-full text-sm">#dice</span>
                <span class="bg-gray-800 px-3 py-1 rounded-full text-sm">#couple</span>
            </div>
        </div>

        <!-- Right 1/3 section: Payment Panel -->
        <div class="bg-gray-900 p-4 rounded-lg space-y-4">
            <h3 class="text-lg font-bold">Unlock This Scene</h3>

            <input type="email" placeholder="Enter your email" class="w-full px-3 py-2 bg-gray-800 text-white rounded">
            <input type="password" placeholder="Enter password" class="w-full px-3 py-2 bg-gray-800 text-white rounded">

            <div class="space-y-2">
                <div class="bg-gray-800 p-3 rounded flex justify-between items-center">
                    <span>12 Months Full Access</span>
                    <span class="text-blue-400">$9.95/mo</span>
                </div>
                <div class="bg-gray-800 p-3 rounded flex justify-between items-center">
                    <span>3 Months Full Access</span>
                    <span class="text-blue-400">$19.95/mo</span>
                </div>
                <div class="bg-gray-800 p-3 rounded flex justify-between items-center">
                    <span>1 Month Full Access</span>
                    <span class="text-blue-400">$29.95</span>
                </div>
                <div class="bg-gray-800 p-3 rounded flex justify-between items-center">
                    <span>2 Day Trial</span>
                    <span class="text-blue-400">$1.00</span>
                </div>
            </div>

            <div>
                <h4 class="text-sm font-semibold mt-4">Payment Method</h4>
                <div class="flex gap-2 mt-2 flex-wrap">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" class="h-6">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/PayPal_logo.svg" class="h-6">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/50/MasterCard_Logo.svg" class="h-6">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Bitcoin_logo.svg" class="h-6">
                </div>
            </div>

            <button class="w-full bg-blue-600 hover:bg-blue-700 transition px-4 py-3 rounded font-bold">
                START MEMBERSHIP
            </button>
        </div>
    </div>
</div>

<script>
    const ambientBtn = document.getElementById("ambientToggle");
    const ambientBg = document.getElementById("ambientBg");
    ambientBtn.addEventListener("click", () => {
        ambientBg.classList.toggle("hidden");
    });
</script>
</body>
</html>

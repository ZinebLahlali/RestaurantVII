<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FineDine | Reservation</title>
    @vite('resources/css/app.css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-gray-100 font-sans">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-md px-8 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <div class="bg-red-500 text-white p-2 rounded-xl text-xl">🍽️</div>
            <h1 class="text-2xl font-bold">
                <span class="text-black">Fine</span><span class="text-red-500">Dine</span>
            </h1>
        </div>

        <div class="flex space-x-8 text-gray-600 font-medium">
            <a href="#" class="hover:text-red-500 transition">Home</a>
            <a href="#" class="hover:text-red-500 transition">Mes favoris</a>
            <a href="#" class="hover:text-red-500 transition">Mon profil</a>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="relative h-[60vh] flex items-center justify-center text-center text-white">
        <!-- <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de"
                 class="w-full h-full object-cover"
                 alt="Restaurant View">
            <div class="absolute inset-0 bg-black/60"></div>
        </div> -->

        <div class="relative z-10">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">Réservez votre table</h2>
            <p class="text-lg text-gray-200">Profitez d'une expérience gastronomique exceptionnelle</p>
        </div>
    </section>

    <!-- RESERVATION FORM -->
    <section class="max-w-4xl mx-auto px-6">
        <div class="bg-white -mt-20 rounded-3xl shadow-2xl p-10">

            <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center">
                Détails de la réservation
            </h3>

            <form action="{{ route('reservation.add') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" value="{{$restaurant_id}}" name="restaurant_id"> 
                <!-- Nombre de Personnes -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">
                        Nombre de personnes
                    </label>
                    <input type="number"
                           name="nombrePersonnes"
                           min="1"
                           required
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                </div>

                <!-- Date Reservation -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">
                        Date de réservation
                    </label>
                    <input type="datetime-local"
                           name="dateReservation"
                           required
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                </div>

                <!-- Submit Button -->
                <div class="text-center pt-4">
                    <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white font-semibold px-10 py-3 rounded-full shadow-lg transition duration-300">
                        Réserver maintenant
                    </button>
                </div>

            </form>

        </div>
    </section>

    <!-- FOOTER -->
    <footer class="mt-20 bg-white py-6 text-center text-gray-500 text-sm">
        © {{ date('Y') }} FineDine. Tous droits réservés.
    </footer>

</body>
</html>

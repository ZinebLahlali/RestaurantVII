<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer Restaurant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

<main class="w-full max-w-2xl">

<form action="{{ route('restau.add') }}" 
      method="POST" 
      enctype="multipart/form-data"
      class="bg-white shadow-xl rounded-2xl p-8 space-y-6">

    @csrf

    <div class="text-center">
        <h2 class="text-3xl font-bold text-gray-800">Créer un restaurant</h2>
        <p class="text-gray-500 text-sm mt-1">Ajoutez les informations du restaurant</p>
    </div>

    <!-- Nom -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Nom du restaurant
        </label>
        <input type="text" 
               name="nom" 
               value="{{ old('nom') }}" 
               required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        @error('nom')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Localisation -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Localisation
        </label>
        <input type="text" 
               name="localisation" 
               value="{{ old('localisation') }}" 
               required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        @error('localisation')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Type de cuisine -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Type de cuisine
        </label>
        <input type="text" 
               name="type_de_cuisine" 
               value="{{ old('type_de_cuisine') }}" 
               required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        @error('type_de_cuisine')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Capacité -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Capacité
        </label>
        <input type="number" 
               name="capacity" 
               value="{{ old('capacite') }}" 
               required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        @error('capacite')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Horaires -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Horaires
        </label>
        <input type="time" 
               name="horaires" 
               value="{{ old('horaires') }}" 
               required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        @error('horaires')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Photo -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Photo du restaurant
        </label>

        <input type="file" 
               name="photo"
               accept="image/*"
               required
               class="w-full text-sm text-gray-500
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-lg file:border-0
                      file:text-sm file:font-semibold
                      file:bg-indigo-100 file:text-indigo-700
                      hover:file:bg-indigo-200">

        @error('photo')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit -->
    <div>
        <button type="submit"
                class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
            Créer le restaurant
        </button>
    </div>

</form>

</main>

</body>
</html>

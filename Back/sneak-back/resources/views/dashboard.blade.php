<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <h2 class="font-medium">Aperçu</h2>
    <br>

    <div class="p-4">
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="flex-col items-center justify-center rounded h-58 dark:bg-gradient-to-r from-bleufd to-bleuciel">
                <h2 class="pl-4 py-2 text-white">
                    Commandes
                </h2>
                <div class="flex justify-center">
                    <div class="w-164 h-164 mb-6 relative" style="width: 75%">
                        <canvas id="myChart" width="300" height="300"></canvas>
                        <div class="inset-0 flex items-center justify-center">
                            <span class="flex text-1.5xl mt-3 text-white">189 commandes effectuées</span>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    var ctx = document.getElementById("myChart").getContext("2d");
                    var myChart = new Chart(ctx, {
                        type: "doughnut",
                        data: {
                            labels: ["En attente", "En cours", "Terminées"],
                            datasets: [{
                                label: "Nombres de commandes",
                                data: [33, 56, 100],
                                backgroundColor: [
                                    "rgba(255, 0, 255, 1)",
                                    "rgba(255, 255, 0, 1)",
                                    "rgba(100, 100, 255, 1)",
                                ],
                                borderColor: [
                                    "rgba(255, 0, 255, 0.5)",
                                    "rgba(255, 255, 0, 0.5)",
                                    "rgba(0, 0, 255, 0.5)",
                                ],
                                borderWidth: 1,
                            }, ],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: true,
                            align: 'center',
                            color: '#fff',
                            cutoutPercentage: 20,
                            animation: {
                                animateScale: true,
                            },
                        },
                    });
                </script>
            </div>
            <div
                class="flex-col h-full items-center justify-center pl-3 rounded bg-bleuciel h-28 dark:bg-gradient-to-r from-bleufd to-bleuciel">
                <h2 class="pl-4 py-2">
                    Article le plus vendu
                </h2>
                <div class="flex flex-col items-center">
                    <img class="flex h-200 w-200 content-center"
                        src="https://i.ibb.co/9wV3hjC/dunk-low-laser-orange-122099.png" alt="image description">
                </div>
                <p class="text-5xl text-center">Nike Dunk Low panda</p>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div
                class="flex-col items-center justify-center pl-3 rounded h-28 dark:bg-gradient-to-r from-bleufd to-bleuciel">
                <h2 class="pl-4 py-2">
                    Chiffre d'affaire
                </h2>
                <p class="text-5xl text-center">5500 €</p>
            </div>
            <div
                class="flex-col items-center justify-center rounded bg-bleuciel h-28 dark:bg-gradient-to-r from-bleufd to-bleuciel">
                <h2 class="pl-4 py-2">
                    Nombres d'utilisateurs
                </h2>
                <p class="text-5xl text-center">238</p>
            </div>
            <div
                class="flex-col items-center justify-center rounded bg-bleuciel h-28 dark:bg-gradient-to-r from-bleufd to-bleuciel">
                <h2 class="pl-4 py-2">
                    Nombres de messages envoyés
                </h2>
                <p class="text-5xl text-center">5689</p>
            </div>
        </div>
    </div>
</x-app-layout>

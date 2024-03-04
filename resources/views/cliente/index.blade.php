<x-app-layout>
<h1 class="text-3xl text-black pb-6">
    Clientes 
    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
        <i class="fas fa-plus"></i>
    </button>

</h1>

<div class="w-full mt-6">
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Lista de Clientes
    </p>
    <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</td>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Pedidos</th>
                    </tr>    
                </thead>
                <tbody class="text-gray-700">
                @foreach ($clientes as $cliente)
                    <tr>
                        <td class="w-1/3 text-left py-3 px-4">{{$cliente->name}}</td>
                        <td class="text-left py-3 px-4">
                            <a class="hover:text-blue-500" href="tel:{{$cliente->cellphone}}">{{$cliente->cellphone}}</a>
                        </td>
                        <td class="text-left py-3 px-4">
                            <a class="hover:text-blue-500" href="{{$cliente->email}}">{{$cliente->email}}</a>
                        </td>
                        <td class="w-1/3 text-left py-3 px-4">
                            10
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>

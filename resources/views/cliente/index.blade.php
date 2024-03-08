<x-app-layout>
<h1 class="text-3xl text-black pb-6">
    Clientes 
    <a href="{{url('clientes/cadastro')}}" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
        <i class="fas fa-plus"></i>
    </a>

</h1>
@if (Session::has('success'))
    <div role="alert">

        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
            Sucesso!
        </div>
        <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
            <p>{!! \Session::get('success') !!}</p>
        </div>
    
    </div>
    @endif
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
                    <th class=""></th>
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
                        <td>
                            <div class="inline-flex">

                                <a href="{{url('clientes/'.$cliente->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <a href="{{url('clientes/remove/'.$cliente->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>

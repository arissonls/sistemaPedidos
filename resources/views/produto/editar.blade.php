<x-app-layout>
    <h1 class="w-full text-3xl text-black pb-6">Editar de Produto</h1>

<div class="w-full mt-6 pl-0">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Editar
    </p>
    @if ($errors->any())
        <div role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Erro!
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" action="{{url('produtos/edit').'/'.$produto->id}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <p class="text-lg text-gray-800 font-medium pb-4">Produto</p>
            <div class="">
                <label class="block text-sm text-gray-600" for="name">Nome</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Nome" aria-label="Name" value="{{$produto->name}}">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="descricao">Descrição</label>
                <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" name="description" id="descricao" cols="30" rows="3">{{$produto->description}}</textarea>
            </div>
            <div class="inline-block mt-2 -mx-1 w-1/2">
                <label class="block text-sm text-gray-600" for="price">Preço</label>
                <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded" id="price" name="price" type="text" required="" value="{{$produto->price}}">
            </div>
            <div class="inline-block mt-2 -mx-1 pl-2 w-1/2">
                <label class="block text-sm text-gray-600" for="slug">Imagem</label>
                <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded" id="slug" name="slug" type="file" {{$produto->slug}}>
            </div>
            
            <div class="mt-6">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Salvar</button>
            </div>
        </form>
    </div>
</div>
<script>
   const element = document.getElementById('price');
   const maskOptions = {
        mask:'R$ num', 
        blocks:{
            num:{
                mask: Number,
                min: 0,
                max: 5000,
                thousandsSeparator: ' ',
                radix: ',',  // fractional delimiter
                normalizeZeros: false,  // appends or removes zeros at ends
            }
        }
    };
    const mask = IMask(element, maskOptions);
</script>
</x-app-layout>

<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!--<x-jet-welcome />-->

                <div class="mt-10 p-5 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">
                                    Crear Productos
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Agregue las características del producto.
                                    <div class="col-span-6 sm:col-span-3">
                                        <label class="block text-sm font-medium text-gray-700">Codigo Barras</label>
                                        {!!DNS1D::getBarcodeHTML('123456', 'C128',3,38)!!}
                                    </div>
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            @if (session('info'))
                                <div class="bg-green-400 border-l-4 border-green-900 text-gray-900 p-4" role="alert">
                                    <p class="font-bold">Información!</p>
                                    <p>{{session('info')}}</p>
                                </div>
                            @endif
                            {!! Form::open(['route' => 'productos.store']) !!}

                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            {!! Form::label('name', 'Código', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                                            {!! Form::text('codigo', null, ['class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                                            @error('codigo')
                                                <span class="mt-2 text-sm text-red-500">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            {!! Form::label('bodega', 'Bodega', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                                            {!! Form::select('bodega_id', $bodegas, null,
                                                            ['class' => 'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) !!}
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            {!! Form::label('marca', 'Marca', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                                            {!! Form::select('marca_id', $marcas, null,
                                                            ['class' => 'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) !!}
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            {!! Form::label('modelo', 'Modelo', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                                            {!! Form::select('modelo_id', $modelos, null,
                                                            ['class' => 'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) !!}
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            {!! Form::label('linea', 'Linea', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                                            {!! Form::select('linea_id', $lineas, null,
                                                            ['class' => 'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) !!}
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            {!! Form::label('categoria', 'Categoría', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                                            {!! Form::select('categoria_id', $categorias, null,
                                                            ['class' => 'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) !!}
                                        </div>
                                        <div class="col-span-6 sm:col-span-6">
                                            {!! Form::label('tallaje', 'Tallaje', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                                        </div>

                                        <div class="col-span-12 sm:col-span-6">
                                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                <table class="min-w-full divide-y divide-gray-200">
                                                    <tbody class="bg-white divide-y divide-gray-200">
                                                        <tr>
                                                            <td class="px-4 py-2 whitespace-nowrap">
                                                            </td>
                                                        @foreach ($colores as $color)

                                                        <td class="px-4 py-2 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <div class="ml-2">
                                                                    <div class="text-sm font-medium text-gray-900">
                                                                        {!! Form::checkbox('colores[]', $color->id, null, ['class' => 'focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded']) !!}
                                                                        {!! $color->nombre !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @endforeach
                                                        </tr>
                                                        @foreach ($tallas as $talla)
                                                        <tr>
                                                        <td class="px-4 py-2 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <div class="ml-2">
                                                                    <div class="text-sm font-medium text-gray-900">
                                                                        {!! Form::checkbox('tallas[]', $talla->id, null, ['class' => 'focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded']) !!}
                                                                        {!! $talla->numero1 !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @foreach ($colores as $color)
                                                        <td class="px-4 py-2 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <div class="ml-2">
                                                                    <div class="text-sm font-medium text-gray-900">
                                                                        {!! Form::number('stock[]', null, ['class' => 'focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 py-0.5 px-1 rounded-md text-center']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @endforeach
                                                        </tr>
                                                        @endforeach
                                                    <!-- More items... -->
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <a href="{{route('tallas.index')}}" class="inline-flex items-center mt-4 mr-5 px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-900 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Regresar
                                    </a>
                                    {!! Form::submit('Guardar', ['class' => 'cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) !!}
                                </div>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

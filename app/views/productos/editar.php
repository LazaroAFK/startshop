<?php
include_once(APPROOT . '/views/includes/header.inc.php');
?>
<form class="flex-grow p-20 overflow-y-scroll flex flex-col gap-4"
action="<?= URLROOT ?>/productos/editar/<?= isset($data['id']) ? $data['id'] : 0 ?>" method="POST" enctype="x-www-form-urlencoded">
  <div class="flex-none flex flex-nowrap gap-2" style="max-width: 685px">
    <a href="#" class="flex-none h-8 px-3 rounded bg-gray-200 flex items-center justify-center">
      <span class="font-medium">Producto</span>
    </a>
    <a href="#" class="flex-none h-8 px-3 flex items-center justify-center">
      <span class="font-medium">Inventario</span>
    </a>
    <div class="flex-grow h-8 flex justify-end">
      <a href="#" title="Ayuda" class="w-8 h-8 rounded hover:bg-gray-200 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <circle cx="12" cy="12" r="9"></circle>
          <line x1="12" y1="17" x2="12" y2="17.01"></line>
          <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4"></path>
        </svg>
      </a>
    </div>
  </div>
  <div class="flex-none mb-10 flex gap-3">
    <label for="" class="flex-shrink w-72 p-px font-medium">Datos de Registro</label>
    <div class="flex-none w-96 px-1 flex flex-col gap-4">
      <div class="flex flex-col">
        <label type="number" for="" class="p-px font-medium">ID</label>
        <input class="flex-grow h-8 px-2 rounded border-2 outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-300" disabled  value="1" />
      </div>
      <div class="flex flex-col">
        <label for="" class="w-72 p-px font-medium">Código de barras</label>
        <input class="flex-grow h-8 px-2 rounded border-2 outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-300" />
      </div>
    </div>
  </div>
  <div class="flex-none mb-10 flex gap-3">
    <label for="" class="flex-shrink w-72 p-px font-medium">Datos del Producto</label>
    <div class="flex-none w-96 px-1 flex flex-col gap-4">
      <div class="flex flex-col">
        <label for="" class="w-72 p-px">Nombre</label>
        <input class="flex-grow h-8 px-2 rounded border-2 outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-300" />
      </div>
      <div class="flex flex-col">
        <label for="" class="w-72 p-px">Descripción</label>
        <input class="flex-grow h-8 px-2 rounded border-2 outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-300" />
      </div>
      <div class="flex flex-col">
        <label for="" class="w-72 p-px">Costo</label>
        <input type="date" class="flex-grow h-8 px-2 rounded border-2 outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-300" />
      </div>
      <div class="flex flex-col">
        <label for="" class="w-72 p-px">Precio</label>
        <input class="flex-grow h-8 px-2 rounded border-2 outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-300" />
      </div>
      <div class="flex flex-col">
        <label for="" class="w-72 p-px">Departamento</label>
        <select name="select" class="flex-grow h-8 px-2 rounded border-2 outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-300">
          <option value="value1">Frutas y Verduras</option>
          <option value="value2" selected>General</option>
          <option value="value3">Mascotas</option>
          <option value="value3">Refrigerados</option>
        </select>
      </div>
    </div>
  </div>
  <div class="flex-none mb-10 flex gap-3">
    <label for="" class="flex-shrink w-72 p-px font-medium">Adicionales</label>
    <div class="flex-none w-96 px-1 flex flex-col gap-4">
      <div class="flex flex-col">
        <div class="flex-grow p-2 rounded border-2 flex flex-col">
          <div class="flex items-center gap-2">
            <input id="cbClientes" type="checkbox" class="rounded border-2 outline-none focus:ring-2 focus:ring-blue-300" />
            <label for="cbClientes" class="w-72 p-px ">Restrincción de edad.</label>
          </div>
          <div class="flex items-center gap-2">
            <input id="cbAlmacenes" type="checkbox" class="rounded border-2 outline-none focus:ring-2 focus:ring-blue-300" />
            <label for="cbAlmacenes" class="w-72 p-px ">Disponible solo Socios.</label>
          </div>
          <div class="flex items-center gap-2">
            <input type="checkbox" class="rounded border-2 outline-none focus:ring-2 focus:ring-blue-300" />
            <label for="" class="w-72 p-px ">Producto unico por Cliente.</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="flex-none mb-10 flex gap-2">
    <label for="" class="flex-shrink w-72 p-px"></label>
    <div class="flex-none w-96 px-1 flex flex-col gap-4">
      <div class="flex flex-col">
        <input type="submit" class="flex-grow h-8 px-2 rounded bg-blue-500 hover:bg-blue-600 text-white outline-none focus:ring-2 focus:ring-blue-300 cursor-pointer"  value="Agregar" />
      </div>
    </div>
  </div>
  <!--div class="flex-none flex flex-wrap gap-4 items-center justify-center">
    <div class="flex-grow h-96 w-72 rounded-xl bg-gray-200"></div>
    <div class="flex-grow h-96 w-72 rounded-xl bg-white border-2"></div>
    <div class="flex-grow h-96 w-72 rounded-xl bg-gray-600"></div-->
</form>

<?php
include_once(APPROOT . '/views/includes/footer.inc.php');
?>
<?php

if(!estaLogueado()){
  redirigir('/usuarios/login');
}

include_once(APPROOT . '/views/includes/header.inc.php');
?>


<div class="flex-grow p-20 overflow-y-scroll flex flex-col gap-4">
    <div class="flex-none flex flex-nowrap gap-2" style="max-width: 685px">
        <a href="#" class="flex-none h-8 px-3 rounded bg-gray-200 flex items-center justify-center">
            <span class="font-medium">Productos</span>
        </a>
        <a href="<?= URLROOT; ?>/productos/agregar"
            class="flex-none h-8 px-3 flex items-center justify-center">
            <span class="font-medium">Agregar</span>
        </a>
        <div class="flex-grow h-8 flex justify-end">
            <a href="#" title="Ayuda" class="w-8 h-8 rounded hover:bg-gray-200 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <line x1="12" y1="17" x2="12" y2="17.01"></line>
                    <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4"></path>
                </svg>
            </a>
        </div>
    </div>
    <table>
        <thead class="h-14 text-xl">
            <tr>
                <th class="text-left pl-4">Código</th>
                <th class="text-left pl-4">Nombre</th>
                <th class="text-left pl-4">Precio</th>
                <th class="text-left pl-4">Costo</th>
                <th class="text-left pl-4">Cantidad</th>
                <th class="text-left pl-4">Acciones</th>
            </tr>
        </thead>
        <tbody class="h-14 text-xl">
            <?php for($i = 0; $i < count($data['productos']); $i += 2){ ?>
            <tr class="h-12 bg-gray-200">
                <td class="text-left pl-4"><?= $data['productos'][$i] -> codigo ?></td>
                <td class="text-left pl-4"><?= $data['productos'][$i] -> nombre ?></td>
                <td class="text-right pr-4"><?= $data['productos'][$i] -> precio ?></td>
                <td class="text-right pr-4"><?= $data['productos'][$i] -> precio_proveedor ?></td>
                <td class="text-right pr-4"><?= $data['productos'][$i] -> cantidad ?></td>
                <td class="flex gap-3 p-2">
                  <a href="<?= URLROOT; ?>/productos/editar/<?= $data['productos'][$i] -> id ?>" class="rounded bg-blue-400 p-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                  </svg>
                  </a>
                  <a href="<?= URLROOT; ?>/productos/eliminar/<?= $data['productos'][$i] -> id ?>" class="rounded bg-red-400 p-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <line x1="4" y1="7" x2="20" y2="7"></line>
                    <line x1="10" y1="11" x2="10" y2="17"></line>
                    <line x1="14" y1="11" x2="14" y2="17"></line>
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                  </svg>
                  </a>
                </td>
            </tr>
            <?php if(isset($data['productos'][$i + 1])){ ?>
            <tr class="h-12">
                <td class="text-left pl-4"><?= $data['productos'][$i + 1] -> codigo ?></td>
                <td class="text-left pl-4"><?= $data['productos'][$i + 1] -> nombre ?></td>
                <td class="text-right pr-4"><?= $data['productos'][$i + 1] -> precio ?></td>
                <td class="text-right pr-4"><?= $data['productos'][$i + 1] -> precio_proveedor ?></td>
                <td class="text-right pr-4"><?= $data['productos'][$i + 1] -> cantidad ?></td>
                <td class="flex gap-3 p-2">
                  <a href="<?= URLROOT; ?>/productos/editar/<?= $data['productos'][$i + 1] -> id ?>" class="rounded bg-blue-400 p-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                  </svg>
                  </a>
                  <a href="<?= URLROOT; ?>/productos/eliminar/<?= $data['productos'][$i + 1] -> id ?>" class="rounded bg-red-400 p-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <line x1="4" y1="7" x2="20" y2="7"></line>
                    <line x1="10" y1="11" x2="10" y2="17"></line>
                    <line x1="14" y1="11" x2="14" y2="17"></line>
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                  </svg>
                  </a>
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>

    <!--div class="flex-none flex flex-wrap gap-4 items-center justify-center">
    <div class="flex-grow h-96 w-72 rounded-xl bg-gray-200"></div>
    <div class="flex-grow h-96 w-72 rounded-xl bg-white border-2"></div>
    <div class="flex-grow h-96 w-72 rounded-xl bg-gray-600"></div-->
</div>


<?php
include_once(APPROOT . '/views/includes/footer.inc.php');
?>
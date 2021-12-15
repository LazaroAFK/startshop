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
    <table class="min-w-full">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-900">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-900">
                    Title
                </th>
                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-900">
                    Email
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    Jane Cooper
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                    Regional Paradigm Technician
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                    jane.cooper@example.com
                </td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    Cody Fisher
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                    Product Directives Officer
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                    cody.fisher@example.com
                </td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    Leonard Krasner
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                    Senior Designer
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                    leonard.krasner@example.com
                </td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    Emily Selman
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                    VP, Hardware Engineering
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                    emily.selman@example.com
                </td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    Anna Roberts
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                    Chief Strategy Officer
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                    anna.roberts@example.com
                </td>
            </tr>
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
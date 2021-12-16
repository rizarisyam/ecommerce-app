<template>
  <!-- component -->

  <div class="w-full">
    <!-- Table -->
    <div class="w-full bg-white shadow-lg rounded-sm border border-gray-200">
      <slot name="header" />

      <div class="p-3">
        <div class="overflow-x-auto">
          <table class="table-auto w-full">
            <thead
              class="text-xs font-semibold uppercase text-gray-400 bg-gray-50"
            >
              <tr>
                <!-- <th class="p-2 whitespace-nowrap">
                  <div class="font-semibold text-left">Name</div>
                </th> -->
                <slot name="thead" />
              </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-100">
              <slot name="tbody" />
              <!-- <tr>
                <td class="p-2 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="font-medium text-gray-800">Alex Shatov</div>
                  </div>
                </td>
                <td class="p-2 whitespace-nowrap">
                  <div class="text-left">alexshatov@gmail.com</div>
                </td>
                <td class="p-2 whitespace-nowrap">
                  <div class="text-left font-medium text-green-500">
                    $2,890.66
                  </div>
                </td>
                <td class="p-2 whitespace-nowrap">
                  <div class="text-lg text-center">🇺🇸</div>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Button from "@/Components/Button.vue";

export default {
  name: "Table",
  data() {
    return {};
  },
  methods: {},
  mounted() {},
  components: { Button },
};
</script>

<style>
</style>

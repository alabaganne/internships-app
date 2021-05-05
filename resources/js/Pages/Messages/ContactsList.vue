<template>
	<div class="w-96 flex-shrink-0 bg-white border-r flex flex-col">
		<div class="flex-shrink-0">
			<div class="px-4 h-20 flex items-center border-b">
				<div>
					<h3 class="text-lg leading-6 font-medium text-gray-900">Messages</h3>
					<p class="max-w-2xl text-sm font-medium text-gray-500">10 messages</p>
				</div>
			</div>
			<div class="px-4 py-3 bg-gray-50 text-gray-500 font-medium text-sm flex items-center">
				<icon name="sort-descending" class="h-5 w-5 mr-2 text-gray-400" />
				Sorted by date
			</div>
		</div>
		<div class="border-t border-b border-gray-200 divide-y flex-1 overflow-y-auto">
			<button
				v-for="(contact, index) in 10"
				:key="index"
				class="text-left hover:bg-gray-50 p-4 flex items-start"
				@click="$emit('select', contact, index)"
			>
				<div>
					<div class="font-medium">Devon Webb</div>
					<p class="text-gray-500 text-sm">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
					<span class="mt-1 text-xs text-blue-500 font-medium">56 minutes ago</span>
				</div>
			</button>
		</div>
	</div>
</template>

<script>
export default {
	emits: ['select']
}
</script>

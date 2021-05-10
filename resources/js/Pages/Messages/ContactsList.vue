<template>
	<div class="w-96 flex-shrink-0 bg-white border-r flex flex-col">
		<div class="flex-shrink-0">
			<div class="px-4 h-20 flex items-center border-b">
				<div>
					<h3 class="text-lg leading-6 font-medium text-gray-900">Messages</h3>
					<p class="max-w-2xl text-sm font-medium text-gray-500">{{ contacts.length }} conversations</p>
				</div>
			</div>
			<div class="px-4 py-3 bg-gray-50 text-gray-500 font-medium text-sm flex items-center">
				<icon name="sort-descending" class="h-5 w-5 mr-2 text-gray-400" />
				Sorted by date
			</div>
		</div>
		<div class="border-t flex-1 overflow-y-auto">
			<template v-if="contacts.length > 0">
				<button
					v-for="contact in contacts"
					:key="contact.id"
					class="text-left hover:bg-gray-50 p-4 flex items-start w-full border-b"
					:class="{
						'bg-gray-50': contact.id === selectedContactId
					}"
					@click="$emit('select-contact', contact)"
				>
					<div>
						<div class="font-medium">{{ contact.name }}</div>
						<!-- <p class="text-gray-500 text-sm">{{ contact.messages[0].text }}</p> -->
						<p class="text-gray-500 text-sm">{{ truncate(contact.messages[contact.messages.length - 1].text, 85) }}</p>
						<!-- <span class="mt-1 text-xs text-blue-500 font-medium">{{ contact.messages[0].created_at }}</span> -->
						<span class="mt-1 text-xs text-blue-500 font-medium">{{ contact.messages[contact.messages.length - 1].created_at }}</span>
					</div>
				</button>
			</template>
			<div v-else class="p-4 text-sm text-gray-700">No messages found</div>
		</div>
	</div>
</template>

<script>
export default {
	emits: ['select-contact'],
	props: {
		contacts: {
			type: Array,
			required: true,
		},
		selectedContactId: Number,
	}
}
</script>

<template>
	<div class="flex-1 flex flex-row max-h-full overflow-y-auto" style="max-height: calc(100vh - 80px);">
		<contacts-list :contacts="contacts" @select="selectContact" />
		<conversation :contact="selectedContact" :messages="messages" />
	</div>
</template>

<script>
import ContactsList from "./ContactsList";
import Conversation from "./Conversation";

export default {
	components: { Conversation, ContactsList },
	props: {
		// messages: Object
	},
	data() {
		return {
			selectedContact: null,
			messages: [],
			contacts: [],
		}
	},
	methods: {
		selectContact(contact, index) {
			this.selectedContact = contact;
		}
	}
}
</script>
<template>
	<div class="flex-1 flex flex-row max-h-full overflow-y-auto" style="max-height: calc(100vh - 80px);">
		<contacts-list
			:contacts="contacts"
			:selectedContactId="selectedContact?.id"
			@select-contact="onSelectContact"
			:key="contacts"
		/>
		<conversation :contact="selectedContact" />
	</div>
</template>

<script>
import ContactsList from "./ContactsList";
import Conversation from "./Conversation";

export default {
	components: { Conversation, ContactsList },
	props: {
		contacts: Array,
	},
	data() {
		return {
			selectedContact: null,
		}
	},
	methods: {
		onSelectContact(contact) {
			this.selectedContact = contact;
			window.history.pushState(null, null, route('messages.index', { id: contact.id }));
		}
	},
	mounted() {
		const id = this.route().params.id;
		if(id) {
			this.selectedContact = this.contacts.filter(contact => contact.id == id)[0];
			return;
		}
		this.selectedContact = this.contacts[0] || null;
	}
}
</script>

<template>
	<authenticated-layout title="Profile" maxWidthClass="max-w-4xl">
		<app-form
			:form="form"
			routeName="profile"
			modelName="Account"
		>
			<section class="p-6">
				<div>
					<h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
					<p class="mt-1 text-sm text-gray-600">
						Use a permanent address where you can receive mail.
					</p>
				</div>
				<div class="mt-6 grid grid-cols-6 gap-x-4 gap-y-6">
					<div class="col-span-3">
						<label for="name" class="required">Full name</label>
						<input type="text" class="form-control" id="name" v-model="form.name">
					</div>
					<div class="col-span-3">
						<label for="email" class="required">Email address</label>
						<input type="email" class="form-control" id="email" v-model="form.email" placeholder="johndoe@example.com">
					</div>
					<div class="col-span-4">
						<label for="phone_number">Phone number</label>
						<input type="text" class="form-control" id="phone_number" v-model="form.phone_number">
					</div>
					<div class="col-span-3">
						<label for="linkedin_profile_url">
							Linkedin Profile URL
						</label>
						<input type="text" name="linkedin_profile_url" id="linkedin_profile_url" class="mt-1 form-control" placeholder="www.example.com" />
					</div>
					<div class="col-span-3">
						<label for="field">City</label>
						<select name="city" id="city" class="form-control" v-model="form.city">
							<option selected value=""></option>
							<option v-for="city in cities" :key="city.id" :value="city.id">{{ city.name }}</option>
						</select>
					</div>
				</div>
			</section>
			<section class="border-t p-6">
				<div>
					<h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
					<p class="mt-1 text-sm text-gray-600">
						This information will be displayed publicly so be careful what you share.
					</p>
				</div>
				<div class="mt-6 grid grid-cols-6 gap-x-4 gap-y-6">
					<div v-if="user.userable_type === 'company'" class="col-span-4">
						<label for="website">
							Website
						</label>
						<input type="text" name="website" id="website" class="mt-1 form-control" placeholder="www.example.com" />
					</div>
					<div class="col-span-6">
						<label for="about">About</label>
						<textarea id="about" class="form-control" rows="7" v-model="form.about" placeholder="Brief description for your profile."></textarea>
					</div>
					<div class="col-span-6">
						<label for="image">Photo</label>
						<div class="mt-1 flex items-center">
							<span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
								<svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
									<path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
								</svg>
							</span>
							<button type="button" class="ml-5 btn btn-secondary">
								Change
							</button>
						</div>
					</div>
				</div>
			</section>
			<section class="border-t p-6">
				<div>
					<h3 class="text-lg font-medium leading-6 text-gray-900">Delete Account</h3>
					<p class="mt-1 text-sm text-gray-600">
						Permanently delete your account.
					</p>
				</div>
				<delete-modal
					title="Delete Account"
					message="Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted."
					:url="route('profile.destroy')"
				>
					<button type="button" class="mt-4 btn btn-danger tracking-widest font-semibold">Delete Account</button>
				</delete-modal>
			</section>
		</app-form>
	</authenticated-layout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/Authenticated";
import DeleteModal from "@/Components/Modals/Delete";
import AppForm from "@/Components/Form";
import Card from "@/Components/Card";

export default {
	components: {
		AuthenticatedLayout,
		DeleteModal,
		AppForm,
		Card,
	},
	props: {
		user: {
			type: Object,
			required: true
		},
		cities: {
			type: Array,
			required: true
		},
	},
	computed: {
		user() {
			return this.$page.props.auth.user;
		}
	},
	data() {
		return {
			form: this.$inertia.form({
				name: '',
				email: '',
				phone_number: '',
				city: null
			})
		}
	}
}
</script>
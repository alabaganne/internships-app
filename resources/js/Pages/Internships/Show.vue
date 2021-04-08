<template>
	<breeze-authenticated-layout title="Internship" subtitle="Details">
		<template v-slot:header-right>
			<button class="btn btn-secondary py-3">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
					<path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
					<path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
				</svg>
				View Applications
			</button>
			<button class="btn btn-dark py-3">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
				</svg>
				Edit
			</button>
			<button class="btn btn-danger py-3">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
				</svg>
				Delete
			</button>
		</template>
		<Card>
			<div class="flex divide-x">
				<div class="flex-1">
					<div class="p-6">
						<internship-header :internship="internship" />
					</div>
					<div class="p-6 border-t prose-lg">
						<p>{{ internship.description }}</p>
					</div>
					<div class="p-6 border-t">
						<div class="font-medium">Attachments</div>
						<div class="mt-2 space-y-1">
							<div v-for="attachment in ['image.jpg', 'document.pdf', 'program.exe', 'logo.png']" :key="attachment" class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
  								<path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
								</svg>
								<span class="link underline">{{ attachment }}</span>
							</div>
						</div>
					</div>
					<div class="p-6 border-t">
						<div class="font-medium">Required Skills</div>
						<RequiredSkills class="mt-2" />
					</div>
				</div>
				<div class="w-96 flex-shrink-0">
					<div class="p-6">
						<button class="btn btn-lg btn-primary w-full justify-center">Submit Application</button>
						<button class="mt-2 btn btn-lg btn-secondary w-full justify-center">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
							</svg>
							Add to Favorites
						</button>
					</div>
					<div class="p-6 border-t"></div>
				</div>
			</div>
		</Card>
	</breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import Card from "@/Components/Card";
import InternshipHeader from "./Shared/Header"
import RequiredSkills from "./Shared/Skills"

export default {
	components: {
		BreezeAuthenticatedLayout,
		Card,
		InternshipHeader,
		RequiredSkills
	},
	props: {
		internship: Object
	},
	mounted() {
		console.log(this.internship);
	}
}
</script>
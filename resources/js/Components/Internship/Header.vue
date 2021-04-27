<template>
	<div>
		<h2 class="text-2xl font-extrabold leading-7 text-gray-900 sm:text-3xl">{{ truncate ? $filters.truncate(internship.title, 50): internship.title }}</h2>
		<div class="mt-2 flex flex-col sm:flex-row sm:flex-wrap sm:mt-1 text-sm text-gray-500">
			<div v-if="full && !route().current('internships.show')" class="sm:mr-4 mt-2 flex items-center">
				<!-- Heroicon name: solid/briefcase -->
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-1" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
				</svg>
				{{ internship.company.name }}
			</div>
			<div v-if="!route().current('internships.show') || internship.remote" class="sm:mr-4 mt-2 flex items-center">
				<!-- Heroicon name: solid/location-marker -->
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-1" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
				</svg>
				{{ internship.remote ? 'Remote' : internship.company.city.name }}
			</div>
			<div class="sm:mr-4 mt-2 flex items-center">
				<!-- Heroicon name: solid/currency-dollar -->
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-1" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M7 2a1 1 0 00-.707 1.707L7 4.414v3.758a1 1 0 01-.293.707l-4 4C.817 14.769 2.156 18 4.828 18h10.343c2.673 0 4.012-3.231 2.122-5.121l-4-4A1 1 0 0113 8.172V4.414l.707-.707A1 1 0 0013 2H7zm2 6.172V4h2v4.172a3 3 0 00.879 2.12l1.027 1.028a4 4 0 00-2.171.102l-.47.156a4 4 0 01-2.53 0l-.563-.187a1.993 1.993 0 00-.114-.035l1.063-1.063A3 3 0 009 8.172z" clip-rule="evenodd" />
				</svg>
				{{ internship.field.name }}
			</div>
			<div v-if="full" class="sm:mr-4 mt-2 flex items-center">
				<!-- Heroicon name: solid/clock -->
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-1" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
				</svg>
				Posted {{ internship.created_at }}
			</div>
			<div class="sm:mr-4 mt-2 flex items-center">
				<!-- Heroicon name: solid/calendar -->
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-1" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
				</svg>
				Closing on {{ internship.closing_at }}
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: {
		internship: {
			type: Object,
			required: true,
		},
		truncate: {
			type: Boolean,
			default: false
		},
		full: {
			type: Boolean,
			default: true,
		}
	}
}
</script>
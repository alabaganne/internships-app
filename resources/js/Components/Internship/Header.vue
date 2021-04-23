<template>
	<div>
		<h2 class="text-2xl font-extrabold leading-7 text-gray-900 sm:text-3xl">{{ truncate ? $filters.truncate(internship.title, 50): internship.title }}</h2>
		<div class="mt-2 flex flex-col sm:flex-row sm:flex-wrap sm:mt-1 text-xs text-gray-500 font-medium">
			<div v-if="full" class="sm:mr-4 mt-2 flex items-center">
				<!-- Heroicon name: solid/briefcase -->
				<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-400 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
				</svg>
				{{ internship.company.name }}
			</div>
			<div v-if="internship.remote || internship.company.city" class="sm:mr-4 mt-2 flex items-center">
				<!-- Heroicon name: solid/location-marker -->
				<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-400 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
				</svg>
				{{ internship.remote ? 'Remote' : internship.company.city.name }}
			</div>
			<div class="sm:mr-4 mt-2 flex items-center">
				<!-- Heroicon name: solid/currency-dollar -->
				<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-400 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
				</svg>
				{{ internship.field.name }}
			</div>
			<div v-if="full" class="sm:mr-4 mt-2 flex items-center">
				<!-- Heroicon name: solid/clock -->
				<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-400 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
				</svg>
				Posted {{ internship.created_at }}
			</div>
			<div class="sm:mr-4 mt-2 flex items-center">
				<!-- Heroicon name: solid/calendar -->
				<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-400 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
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
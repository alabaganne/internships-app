<template>
	<div>
		<inertia-link :href="route('internships.show', internship)" class="block">
			<card class="transform hover:-translate-y-1 transition-transform duration-100">
				<div class="p-6" :class="{ 'lg:px-7 lg:pb-7': full }">
					<div class="flex justify-between">
						<internship-header :internship="internship" :full="full" truncate />
						<div v-if="$page.props.auth.user.userable_type === 'student'" class="flex-shrink-0">
							<button type="button" @click.prevent="like(internship)"
								class="text-red-600 hover:bg-red-100 p-2 text-sm font-medium rounded-lg transition-colors duration-200 flex items-center"
							>
								<svg class="h-5 w-5 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
								</svg>
								{{ internship.liked ? 'Dislike' : 'Like' }}
							</button>
						</div>
					</div>
					<p class="mt-4 text-gray-700 leading-7">
						{{ $filters.truncate(internship.description, 350) }}
					</p>
					<skills v-if="full" class="mt-2" />
				</div>
			</card>
		</inertia-link>
	</div>
</template>

<script>
import InternshipHeader from "@/Components/Internship/Header";
import Skills from "@/Components/Skills";
import Card from "@/Components/Card";
import Like from "@/mixins/like"

export default {
	mixins: [Like],
	components: {
		InternshipHeader,
		Skills,
		Card
	},
	props: {
		internship: Object,
		full: {
			type: Boolean,
			default: true,
		}
	},
	
}
</script>
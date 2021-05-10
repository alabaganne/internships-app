export default {
	emits: ['dislike'],
	methods: {
		toggleLike(internship) {
			this.$inertia.post(route('likes.store', internship), {}, {
				onSuccess: () => {
					if(internship.liked) {
						internship.liked = false;
						this.currentUser.likes_count--;
						this.$emit('dislike', internship);
					} else {
						internship.liked = true;
						this.currentUser.likes_count++;
					}
				},
				onError: (errors) => console.log(errors),
				preserveState: true,
				preserveScroll: true,
			});
		}
	}
}

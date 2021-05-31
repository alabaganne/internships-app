export default {
	emits: ['dislike'],
	methods: {
		toggleLike(internship) {
			axios.post(route('likes.store', internship))
				.then(() => {
					if(internship.liked) {
						internship.liked = false;
						this.currentUser.likes_count--;
						this.$emit('dislike', internship);
					} else {
						internship.liked = true;
						this.currentUser.likes_count++;
					}
				})
				.catch(error => console.log(error));
		}
	}
}

# PartnerComm Quick Find Views plugin

## Notes
This is the PartnerComm Quick Find Views engine, whcih used in tandem with the Quick Find plugin and a qf_templates directory in a WordPress theme, allows for custom views to be created on a per site basis.

We need to get a better underestanding of how we can possibly / if it's desirable to port over commonly used views from the qf_templates directory currently in our base wordpress docker repo to this plugin for ease of re-use.

Let's work on better documenting this plugin and how it interacts with the QF plugin proper, and look into whether it makes sense to merge the two together.

# Release Notes
- 1.0.2 (2018-09-25)
	- Add `getPostContentRaw` method to get unfiltered post content

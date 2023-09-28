import apiFetch from "@wordpress/api-fetch";

export function FETCH_MODULES(action) {
  return apiFetch({
    path: '/wp-benchy/v1/modules'
  });
}

export function RUN_MODULE(action) {
  return apiFetch({
    path: `/wp-benchy/v1/module/${action.moduleId}`
  });
}
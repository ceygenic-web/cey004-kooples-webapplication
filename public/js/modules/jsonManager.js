/**
 * json manager module
 * this module is responsible for handling jsons files
 *
 */

// json manager
function jsonHandler(json) {
  try {
    const object = JSON.parse(json);
  } catch (error) {
    console.log("Something Went Wrong!, contact devs");
    return null;
  }
  return object;
}
